<?php

namespace App\Providers;

use App\Services\Interfaces\AuthService;
use App\Services\Interfaces\LocationCountryService;
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
        $this->app->bind(
            AuthService::class,
            \App\Services\AuthService::class
        );

        $this->app->bind(
            LocationCountryService::class,
            \App\Services\LocationCountryService::class
        );
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
