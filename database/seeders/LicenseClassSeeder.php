<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LicenseClass;

class LicenseClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LicenseClass::create([
            'name' => 'Basic',
            'description' => 'Licencia básica con acceso limitado',
            'default_max_users' => 10,
            'default_modules' => ['auditorias'],
            'default_duration_months' => 6,
        ]);

        LicenseClass::create([
            'name' => 'Standard',
            'description' => 'Licencia estándar con más funcionalidades',
            'default_max_users' => 25,
            'default_modules' => ['auditorias', 'reportes'],
            'default_duration_months' => 12,
        ]);

        LicenseClass::create([
            'name' => 'Premium',
            'description' => 'Licencia premium con todos los módulos',
            'default_max_users' => 50,
            'default_modules' => ['auditorias', 'reportes', 'normas'],
            'default_duration_months' => 24,
        ]);

    }
}
