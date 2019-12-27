<?php

namespace Laracontact\Tests;

class TestCase extends   \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return ['Laracontact\LaracontactServiceProvider'];
    }
}