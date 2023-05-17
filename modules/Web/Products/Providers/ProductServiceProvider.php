<?php

namespace Web\Products\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //register the repository pattern service provider
        $this->app->register(ProductRepositoryPatternServiceProvider::class);

        //load the migrations
        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");

        // load the views
        $this->loadViewsFrom(__DIR__ . "/../Resources/Views" , "Product");

        //load the routes
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
