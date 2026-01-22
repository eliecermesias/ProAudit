<?php

namespace Database\Seeders;

/*use Illuminate\Database\Seeder;
use App\Models\User;
*/

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crear roles si no existen
        $roles = ['superadmin', 'developer', 'admin', 'auditor', 'advisor', 'guest'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Usuario Superadmin
        $superadmin = User::factory()->create([
            'name' => 'Eliecer Mesias',
            'email' => 'eliecer.mesias@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $superadmin->assignRole('superadmin');

        $developer = User::factory()->create([
            'name' => 'Dev Demo',
            'email' => 'dev@proaudit.com',
            'password' => Hash::make('password'),
        ]);
        $developer->assignRole('developer');

        $admin = User::factory()->create([
            'name' => 'Admin Demo',
            'email' => 'admin@proaudit.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $auditor = User::factory()->create([
            'name' => 'Auditor Demo',
            'email' => 'auditor@proaudit.com',
            'password' => Hash::make('password'),
        ]);
        $auditor->assignRole('auditor');

        $advisor = User::factory()->create([
            'name' => 'Advisor Demo',
            'email' => 'advisor@proaudit.com',
            'password' => Hash::make('password'),
        ]);
        $advisor->assignRole('advisor');

        $guest = User::factory()->create([
            'name' => 'Guest Demo',
            'email' => 'guest@proaudit.com',
            'password' => Hash::make('password'),
        ]);
        $guest->assignRole('guest');

    
        // 20 usuarios falsos con roles aleatorios


        for ($i = 0; $i < 20; $i++) {
            $role = Arr::random($roles); // selecciona un rol aleatorio
            $user = User::factory()->create();
            $user->assignRole($role);
        }

    }
}