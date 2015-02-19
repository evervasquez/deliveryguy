<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 19/02/15
 * Time: 12:14
 */

namespace domain\providers;


use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind('domain\social\SocialManager', 'domain\delivery\Employee\EmployeeRepositorie');

    }

}