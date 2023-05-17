<?php

namespace Web\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Web\Products\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()
            ->count(20)
            ->create();
    }
}
