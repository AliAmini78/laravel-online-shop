<?php

namespace Web\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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

        // register user repository pattern
        $this->app->register(UserRepositoryPatternServiceProvider::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
