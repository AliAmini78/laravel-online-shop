<?php

namespace Web\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Web\User\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(20)
            ->create();
    }
}
