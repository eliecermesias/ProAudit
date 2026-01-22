<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LicenseType;


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
