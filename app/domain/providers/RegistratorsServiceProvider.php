<?php
namespace domain\providers;

use Illuminate\Support\ServiceProvider;
use domain\events\ConfirmationEmailHandler;

class RegistratorsServiceProvider extends ServiceProvider
{


    public function boot()
    {
        $this->app->events->subscribe(new ConfirmationEmailHandler($this->app['mailer']));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}