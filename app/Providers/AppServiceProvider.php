<?php

namespace App\Providers;

use App\IpDatabaseLocator;
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
        $this->app->singleton(Locator::class, function ($app) {
            switch ($app->make('config')->get('services.ip-locator')) {
                case 'api':
                    return new IpLocationLocator;
                case 'database':
                    return new IpDatabaseLocator;
                default:
                    throw new \RuntimeException("Unknown IP Locator service");
            }
        });
    }
}
