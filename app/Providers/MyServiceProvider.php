<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Utils\ResponseUtility;
class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('responder', static function() {
            return new ResponseUtility();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
