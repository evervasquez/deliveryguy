<?php
namespace domain\providers;

use Illuminate\Events\EventServiceProvider as ServiceProvider;
use domain\events\ConfirmationEmailHandler;

class RegistratorsServiceProvider extends ServiceProvider{

    public function boot(DispatcherContract $events)
    {
        $this->app->events->subscribe(new ConfirmationEmailHandler(
                $this->app['mailer'])
        );
    }
}