<?php

namespace Laracontact\Tests;

class TestCase extends   \Orchestra\Testbench\TestCase
{


    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'laracontacttest');
        $app['config']->set('database.connections.laracontacttest', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['config']->set('contact_request.redirectTo', '/thanks-message');
    }

    protected function getPackageProviders($app)
    {
        return ['Laracontact\LaracontactServiceProvider'];
    }
}