<?php

namespace M12\Models\Tests;

use M12\Providers\ModelsServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ModelsServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations()
    {
        // Миграции ИЗ ПАКЕТА (users, sessions, reset tokens, soft deletes)
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Sanctum миграции — вручную
        $this->artisan('migrate', [
            '--database' => 'testing',
            '--path' => 'vendor/laravel/sanctum/database/migrations',
        ]);
    }
}
