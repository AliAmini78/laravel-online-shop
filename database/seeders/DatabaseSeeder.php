<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Web\Products\Database\Seeders\ProductSeeder;
use Web\User\Database\Seeders\UserSeeder;
use Web\User\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /**
         * make admin user
         */
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            "is_admin" => 1,
            "password" => 123456,
        ]);

        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
        ]);


    }
}
