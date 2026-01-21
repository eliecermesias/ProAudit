<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Arr;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario Desarrollador
        User::factory()->superadmin()->create([
            'name' => 'Eliecer Mesias',
            'email' => 'eliecer.mesias@gmail.com',
            'password' => bcrypt('12345678'),
            'is_superadmin' => true,
        ]);

        

        // Usuario Desarrollador
        User::factory()->desarrollador()->create([
            'name' => 'Dev Demo',
            'email' => 'dev@proaudit.com',
            'password' => bcrypt('password'),
        ]);

        // 20 usuarios falsos con roles aleatorios
        $roles = ['administrador', 'auditor', 'asesor', 'invitado', 'desarrollador'];

        for ($i = 0; $i < 20; $i++) {
            $role = Arr::random($roles); // selecciona un rol aleatorio
            User::factory()->{$role}()->create();
        }

    }
}