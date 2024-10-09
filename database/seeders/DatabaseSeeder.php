<?php

namespace Database\Seeders;

use Database\Seeders\Spatie\PermissionSeeder;
use Database\Seeders\Spatie\RoleSeeder;
use Database\Seeders\User\AdminSeeder;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
