<?php

namespace App\Providers;

use App\Services\Interfaces\AuthService;
use App\Services\Interfaces\FreezerService;
use App\Services\Interfaces\LocationCityService;
use App\Services\Interfaces\LocationCountryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            AuthService::class,
            \App\Services\AuthService::class
        );

        $this->app->bind(
            LocationCountryService::class,
            \App\Services\LocationCountryService::class
        );

        $this->app->bind(
            LocationCityService::class,
            \App\Services\LocationCityService::class
        );

        $this->app->bind(
            FreezerService::class,
            \App\Services\FreezerService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
