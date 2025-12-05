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

    protected function getPackageMigrationsPath($app)
    {
        return __DIR__ . '/../database/migrations';
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
