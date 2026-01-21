<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        // Roles con guard web
        $admin    = Role::firstOrCreate(['name' => 'Administrador', 'guard_name' => 'web']);
        $auditor  = Role::firstOrCreate(['name' => 'Auditor', 'guard_name' => 'web']);
        $asesor   = Role::firstOrCreate(['name' => 'Asesor', 'guard_name' => 'web']);
        $invitado = Role::firstOrCreate(['name' => 'Invitado', 'guard_name' => 'web']);
        $dev      = Role::firstOrCreate(['name' => 'Desarrollador', 'guard_name' => 'web']);

        // Asignación de permisos a roles
        $admin->givePermissionTo(['administrar sistema', 'gestionar licencias']);
        $auditor->givePermissionTo(['realizar auditorias']);
        $asesor->givePermissionTo(['revisar informes']);
        $invitado->givePermissionTo(['consultar informacion']);
        $dev->givePermissionTo(Permission::all()); // acceso total
    }
}