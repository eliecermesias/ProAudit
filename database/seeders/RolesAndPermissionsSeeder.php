<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
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
                'guard_name' => 'web',
            ]);
        }

        // Roles base
        $roles = [
            'superadmin' => Permission::all()->pluck('name')->toArray(),
            'developer'  => Permission::all()->pluck('name')->toArray(),
            'admin'      => ['administrar sistema', 'gestionar licencias'],
            'auditor'    => ['realizar auditorias'],
            'advisor'    => ['revisar informes'],
            'guest'      => ['consultar informacion'],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);

            // 👇 sincroniza permisos, evita duplicados y asegura consistencia
            $role->syncPermissions($rolePermissions);
        }
    }
}