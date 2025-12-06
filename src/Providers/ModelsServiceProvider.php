<?php

namespace M12\Providers;

use Illuminate\Support\ServiceProvider;

class ModelsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }
    }
}
