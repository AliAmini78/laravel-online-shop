<?php

namespace Web\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadViewsFrom(__DIR__ . "../Resources/Views" , "Auth");
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
