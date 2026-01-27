<?php
namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        // Compañías base (ejemplo)
        $companies = [
            ['name' => 'ProAudit', 'nit' => '123456789', 'email' => 'info@proaudit.com'],
            ['name' => 'DemoCorp', 'nit' => '987654321', 'email' => 'contact@democorp.com'],
        ];

        foreach ($companies as $company) {
            Company::updateOrCreate(
                ['nit' => $company['nit']], // condición única
                $company
            );
        }

        // Solo en local/testing generamos datos falsos
        if (app()->environment('local')) {
            Company::factory(10)->create();
        }
    }
}