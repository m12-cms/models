<?php

namespace M12\Models\Tests;

use Laravel\Sanctum\SanctumServiceProvider;
use M12\Providers\ModelsServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SanctumServiceProvider::class,
            ModelsServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(
            base_path('vendor/laravel/sanctum/database/migrations')
        );

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->artisan('migrate', ['--database' => 'testing']);
    }
}
