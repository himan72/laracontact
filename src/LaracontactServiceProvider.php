<?php


namespace Laracontact;


use Illuminate\Support\ServiceProvider;

class LaracontactServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laracontact');

    }

    public function register()
    {

    }

}
