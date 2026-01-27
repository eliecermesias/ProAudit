<?php
namespace Database\Seeders;

use App\Models\LicenseType;
use Illuminate\Database\Seeder;

class LicenseTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name' => 'Licencia Empresa',
                'scope' => 'company',
                'description' => 'Aplica a toda la empresa',
            ],
            [
                'name' => 'Licencia Usuario',
                'scope' => 'user',
                'description' => 'Aplica a un usuario individual',
            ],
        ];

        foreach ($types as $type) {
            LicenseType::updateOrCreate(
                ['name' => $type['name']],
                $type
            );
        }
    }
}