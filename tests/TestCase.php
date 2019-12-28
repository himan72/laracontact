<?php

namespace Laracontact\Tests;

class TestCase extends   \Orchestra\Testbench\TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('vendor:publish', ['--tag' => 'Laracontact\LaracontactServiceProvider'])->run();
        $this->artisan('migrate')->run();
    }


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
        $app['config']->set('contact_request.notifiables', ['test1@test.com', 'test2@test.com', 'test3@test.com']);
        $app['config']->set('contact_request.send_mails', true);
        $app['config']->set('contact_request.recapcha.recaptcha_secret', env('RECAPTCHA_SECRET'));
        $app['config']->set('contact_request.recapcha.recaptcha_recaptcha_sitekey', env('RECAPTCHA_SITEKEY'));

        dd(config('contact_request.recapcha.recaptcha_secret'));


    }

    protected function getPackageProviders($app)
    {
        return ['Laracontact\LaracontactServiceProvider'];
    }
}