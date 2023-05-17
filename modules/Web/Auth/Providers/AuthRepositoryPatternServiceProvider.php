<?php

namespace Web\Auth\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Web\Auth\Database\Repositories\Contracts\AuthRepositoryInterface;
use Web\Auth\Database\Repositories\Eloquents\AuthRepository;

class AuthRepositoryPatternServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
