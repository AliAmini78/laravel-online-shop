<?php

namespace Web\Products\Providers;

use Illuminate\Support\ServiceProvider;
use Web\Products\Database\Repositories\Contracts\ProductRepositoryInterface;
use Web\Products\Database\Repositories\Eloquents\ProductRepository;

class ProductRepositoryPatternServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class , ProductRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
