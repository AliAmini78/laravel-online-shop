<?php

namespace Web\Common\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // add migration path
        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");

        // add routes path
        Route::middleware('web')
            ->group(__DIR__ .'/../Routes/web.php');

        // add Resource Path
        $this->loadViewsFrom(__DIR__ . "/../Resources/Views" , 'Common');

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
