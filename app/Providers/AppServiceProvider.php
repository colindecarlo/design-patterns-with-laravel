<?php

namespace App\Providers;

use App\IpLocationLocator;
use App\Locator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Locator::class, function () {
            return new IpLocationLocator();
        });
    }
}
