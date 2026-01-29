<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles si no existen
        $roles = ['superadmin', 'developer', 'admin', 'auditor', 'advisor', 'guest'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Usuario Superadmin
        $superadmin = User::updateOrCreate(
            ['email' => 'eliecer.mesias@gmail.com'],
            ['name' => 'Eliecer Mesias', 'password' => Hash::make('12345678')]
        );
        $superadmin->assignRole('superadmin');

        // Otros usuarios fijos
        $developer = User::updateOrCreate(
            ['email' => 'dev@proaudit.com'],
            ['name' => 'Dev Demo', 'password' => Hash::make('password')]
        );
        $developer->assignRole('developer');

        $admin = User::updateOrCreate(
            ['email' => 'admin@proaudit.com'],
            ['name' => 'Admin Demo', 'password' => Hash::make('password')]
        );
        $admin->assignRole('admin');

        $auditor = User::updateOrCreate(
            ['email' => 'auditor@proaudit.com'],
            ['name' => 'Auditor Demo', 'password' => Hash::make('password')]
        );
        $auditor->assignRole('auditor');

        $advisor = User::updateOrCreate(
            ['email' => 'advisor@proaudit.com'],
            ['name' => 'Advisor Demo', 'password' => Hash::make('password')]
        );
        $advisor->assignRole('advisor');

        $guest = User::updateOrCreate(
            ['email' => 'guest@proaudit.com'],
            ['name' => 'Guest Demo', 'password' => Hash::make('password')]
        );
        $guest->assignRole('guest');

        // 20 usuarios falsos con roles aleatorios (solo en local/testing)
        if (app()->environment('local')) {
            for ($i = 0; $i < 20; $i++) {
                $role = Arr::random($roles);
                $user = User::factory()->create();
                $user->assignRole($role);
            }
        }
    }
}
