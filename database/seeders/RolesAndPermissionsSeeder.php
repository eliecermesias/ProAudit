<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permisos base
        $permissions = [
            'gestionar licencias',
            'realizar auditorias',
            'revisar informes',
            'consultar informacion',
            'administrar sistema',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web', // 👈 importante
            ]);
        }

        // RolesAndPermissionsSeeder.php
        $superadmin = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => 'web']);
        $developer = Role::firstOrCreate(['name' => 'developer', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $auditor = Role::firstOrCreate(['name' => 'auditor', 'guard_name' => 'web']);
        $advisor = Role::firstOrCreate(['name' => 'advisor', 'guard_name' => 'web']);
        $guest = Role::firstOrCreate(['name' => 'guest', 'guard_name' => 'web']);

        // Asignación de permisos
        $superadmin->givePermissionTo(Permission::all());
        $developer->givePermissionTo(Permission::all());
        $admin->givePermissionTo(['administrar sistema', 'gestionar licencias']);
        $auditor->givePermissionTo(['realizar auditorias']);
        $advisor->givePermissionTo(['revisar informes']);
        $guest->givePermissionTo(['consultar informacion']);

    }
}
