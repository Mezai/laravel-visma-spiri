<?php

namespace Mezai\Visma\Commands;

use Illuminate\Console\Command;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\Token;

class RefreshVismaAccessToken extends Command
{
    protected $signature = 'visma:refresh-access-token
                            {--force : Force the refresh of the access token, even if it is not expired.}';

    protected $description = 'Refresh the Visma access token.';

    public function handle()
    {
        /**
         * @var TokenStorage $storageProvider
         */
        $storageProvider = app(config('visma.storage_provider'));

        $token = $storageProvider->getToken();

        if (!$token) {
            $this->error('No access token found. Please authenticate with Visma first.');
            return self::FAILURE;
        }

        // Refresh if token expires within 5 minutes (or is already expired)
        if (now()->addMinutes(5)->lessThan($token->expiresAt) && !$this->option('force')) {
            $this->info('Access token is still valid. No need to refresh. Use with --force to refresh anyway.');
            return self::SUCCESS;
        }

        /**
         * @var Token $newToken
         */
        $newToken = Socialite::driver('visma')->refreshToken($token->refreshToken);

        $storageProvider->storeToken($newToken);

        $this->info('Access token refreshed successfully.');

        return self::SUCCESS;
    }


}
