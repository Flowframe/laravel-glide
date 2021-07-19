<?php

namespace Flowframe\LaravelGlide\Tests;

use Flowframe\LaravelGlide\GlideServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            GlideServiceProvider::class,
        ];
    }
}
