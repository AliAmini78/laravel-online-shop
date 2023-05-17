<?php

namespace Web\Auth\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //register the repository pattern service provider
        $this->app->register(AuthRepositoryPatternServiceProvider::class);

        //load the views
        $this->loadViewsFrom(__DIR__ . "/../Resources/Views" , "Auth");

        // load the routes
        Route::middleware(['web'])
            ->group(__DIR__ .'/../Routes/web.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
