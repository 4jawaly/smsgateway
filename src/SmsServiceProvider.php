<?php

namespace Jawaly\SmsGateway;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/jawaly.php' => config_path('jawaly.php'),
                ], 'config');
        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations')
                ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('jawaly', function ()
        {
            return new \Jawaly\SmsGateway\Jawaly();
        });
    }

}
