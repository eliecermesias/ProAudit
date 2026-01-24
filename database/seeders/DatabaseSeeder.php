<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RolesAndPermissionsSeeder::class,
            usersSeeder::class,
            menuSeeder::class,
            LicenseTypeSeeder::class,
            LicenseClassSeeder::class,
            CompanySeeder::class,
            LicenseSeeder::class,
            companyUserSeeder::class,
        ]);

    }
}
