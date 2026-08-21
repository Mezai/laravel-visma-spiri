<?php

namespace Mezai\Visma\Providers;

use Illuminate\Support\ServiceProvider;
use Mezai\Visma\Client;

class VismaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $source = realpath($raw = __DIR__ . '/../../config/visma.php') ?: $raw;
        $this->publishes([$source => config_path('visma.php')], 'config');

        $this->mergeConfigFrom($source, 'visma');

        $this->app->alias('visma', Client::class);

    }
}
