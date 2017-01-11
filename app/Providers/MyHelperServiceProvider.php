<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class MyHelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('myhelper', function()
        {
            return new \App\HelperClasses\MyHelper;
        });
        App::bind('viewhelper', function()
        {
            return new \App\HelperClasses\ViewHelper;
        });
    }
}
