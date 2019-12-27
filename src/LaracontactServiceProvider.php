<?php


namespace Laracontact;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class LaracontactServiceProvider extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laracontact');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../database/migrations/create_contact_requests_table.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'laracontact-migration');

        $this->publishes([
            __DIR__.'/../config/contact_request.php' => config_path('contact_request.php'),
        ], 'laracontact-config');

        $this->publishes([
            __DIR__.'/../resources/views/contact_request' => resource_path('views/vendor/contact_request'),
        ], 'laracontact-views');

    }

    public function register()
    {

    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');
        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_create_contact_requests_table.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_contact_requests_table.php")
            ->first();
    }

}
