<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Whenever a user calls an instance of this class, we'll return value from the function.
        \App::bind('App\Billing\Mpesa', function(){
            return new \App\Billing\Mpesa('mypersonalkey');
        });


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
