<?php

namespace Mezai\Visma\Providers;

use Illuminate\Contracts\Container\Container;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Mezai\Visma\Client;
use Illuminate\Support\Arr;
use Mezai\Visma\Visma;
use Mezai\Visma\VismaClient;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Mezai\Visma\Exceptions\InvalidConfiguration;
use Laravel\Socialite\Facades\Socialite;
use Mezai\Visma\Commands\RefreshVismaAccessToken;
use Mezai\Visma\Socialite\VismaSocialiteProvider;

class VismaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-visma')
            ->hasRoute('web')
            ->hasConfigFile()
            ->hasCommand(RefreshVismaAccessToken::class)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile();
            });
    }

    public function bootingPackage()
    {
        Socialite::extend('visma', function ($app) {
            $config = Arr::get($app, 'config.visma');

            return Socialite::buildProvider(VismaSocialiteProvider::class, [
                'client_id' => Arr::get($config, 'client_id'),
                'client_secret' => Arr::get($config, 'client_secret'),
                'redirect' => url(Arr::get($config, 'routes.oauth.callback')),
            ]);
        });

        RateLimiter::for('visma', fn() => Limit::perMinute(600));
    }

    public function registeringPackage()
    {

        $this->app->bind(VismaClient::class, function () {
            $this->protectAgainstInvalidConfiguration(config('visma'));

            /**
             * @var TokenStorage $tokenStorage
             */
            $tokenStorage = app(config('visma.storage_provider'));
            $storedToken = $tokenStorage->getToken();

            // Auto-refresh token if expired or expiring soon
            if ($storedToken && now()->addMinutes(5)->greaterThan($storedToken->expiresAt)) {
                $newToken = \Laravel\Socialite\Facades\Socialite::driver('visma')->refreshToken($storedToken->refreshToken);
                $tokenStorage->storeToken($newToken);
                $storedToken = $tokenStorage->getToken();
            }

            return (new VismaClient(
                accessToken: $storedToken->token,
                baseUrl: config('visma.base_url'),
            ));
        });

        $this->app->bind(Visma::class, function () {
            $this->protectAgainstInvalidConfiguration(config('visma'));
            $client = app(VismaClient::class);

            return new Visma($client);
        });

        $this->app->alias(Visma::class, 'laravel-visma');
    }

    protected function protectAgainstInvalidConfiguration(array $config): void
    {
        if (empty($config['storage_provider'])) {
            throw InvalidConfiguration::missingStorageProvider();
        }

        if (empty($config['client_id'])) {
            throw InvalidConfiguration::missingClientId();
        }

        if (empty($config['client_secret'])) {
            throw InvalidConfiguration::missingClientSecret();
        }

        if (empty($config['base_url'])) {
            throw InvalidConfiguration::missingBaseUrl();
        }
    }

}
