<?php
namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanyUserSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();
        $users = User::all();

        foreach ($companies as $company) {
            // asignar entre 3 y 5 usuarios aleatorios a cada empresa
            $assignedUsers = $users->random(rand(3, 5));

            foreach ($assignedUsers as $user) {
                // 👇 evita duplicados
                $company->users()->syncWithoutDetaching([
                    $user->id => [
                        'role' => fake()->randomElement(['Gerente', 'Auditor', 'Asesor']),
                    ]
                ]);
            }
        }
    }
}