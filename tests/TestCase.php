<?php

namespace M12\Models\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use M12\Models\ModelsServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ModelsServiceProvider::class,
        ];
    }
}
