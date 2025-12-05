<?php

namespace M12\Models\Tests;

use M12\Models\ModelsServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ModelsServiceProvider::class,
        ];
    }
}
