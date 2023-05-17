<?php

namespace Web\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Web\User\Database\Repositories\Contracts\UserRepositoryInterface;
use Web\User\Database\Repositories\Eloquents\UserRepository;

class UserRepositoryPatternServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
