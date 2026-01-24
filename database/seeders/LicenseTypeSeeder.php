<?php

namespace Database\Seeders;

use App\Models\LicenseType;
use Illuminate\Database\Seeder;

class LicenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tipos fijos
        LicenseType::create([
            'name' => 'Licencia Empresa',
            'scope' => 'company',
            'description' => 'Aplica a toda la empresa',
        ]);

        LicenseType::create([
            'name' => 'Licencia Usuario',
            'scope' => 'user',
            'description' => 'Aplica a un usuario individual',
        ]);

    }
}
