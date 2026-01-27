<?php
namespace Database\Seeders;

use App\Models\LicenseClass;
use Illuminate\Database\Seeder;

class LicenseClassSeeder extends Seeder
{
    public function run(): void
    {
        $classes = [
            [
                'name' => 'Basic',
                'description' => 'Licencia básica con acceso limitado',
                'default_max_users' => 10,
                'default_modules' => json_encode(['auditorias']),
                'default_duration_months' => 6,
            ],
            [
                'name' => 'Standard',
                'description' => 'Licencia estándar con más funcionalidades',
                'default_max_users' => 25,
                'default_modules' => json_encode(['auditorias', 'reportes']),
                'default_duration_months' => 12,
            ],
            [
                'name' => 'Premium',
                'description' => 'Licencia premium con todos los módulos',
                'default_max_users' => 50,
                'default_modules' => json_encode(['auditorias', 'reportes', 'normas']),
                'default_duration_months' => 24,
            ],
        ];

        foreach ($classes as $class) {
            LicenseClass::updateOrCreate(
                ['name' => $class['name']], // condición única
                $class
            );
        }
    }
}