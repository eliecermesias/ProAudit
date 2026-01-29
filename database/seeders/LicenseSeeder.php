<?php

namespace Database\Seeders;

use App\Models\License;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    public function run(): void
    {
        // Ejemplo de licencia base fija
        License::updateOrCreate(
            ['license_key' => 'BASE-LICENSE-001'],
            [
                'company_id' => null,
                'user_id' => null,
                'license_type_id' => 1, // asegúrate que exista
                'license_class_id' => 1, // asegúrate que exista
                'starts_at' => now(),
                'expires_at' => now()->addYear(),
                'max_users' => 10,
                'modules_enabled' => json_encode(['auditorias']),
                'is_active' => true,
            ]
        );

        // Solo en local/testing generamos licencias falsas
        if (app()->environment('local')) {
            License::factory(30)->create();
        }
    }
}
