<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menú principal
        $dashboard = Menu::create([
            'name' => 'Dashboard',
            'icon' => 'home', // Heroicon: home
            'url' => '/dashboard',
            'slug' => 'dashboard',
            'current' => '/dashboard',
            'priority' => 1,
        ]);

        $companies = Menu::create([
            'name' => 'Empresas',
            'icon' => 'building-office', // Heroicon: building-office
            'url' => '/companies',
            'slug' => 'companies',
            'priority' => 2,
        ]);

        $users = Menu::create([
            'name' => 'Usuarios',
            'icon' => 'users', // Heroicon: users
            'url' => '/users',
            'slug' => 'users',
            'priority' => 3,
        ]);

        $licenses = Menu::create([
            'name' => 'Licencias',
            'icon' => 'key', // Heroicon: key
            'url' => '/licenses',
            'slug' => 'licenses',
            'priority' => 4,
        ]);

        $audits = Menu::create([
            'name' => 'Auditorías',
            'icon' => 'clipboard-document-check', // Heroicon: clipboard-document-check
            'url' => '/audits',
            'slug' => 'audits',
            'priority' => 5,
        ]);

        $norms = Menu::create([
            'name' => 'Normas ISO',
            'icon' => 'book-open', // Heroicon: book-open
            'url' => '/norms',
            'slug' => 'norms',
            'priority' => 6,
        ]);

        $reports = Menu::create([
            'name' => 'Reportes',
            'icon' => 'chart-bar', // Heroicon: chart-bar
            'url' => '/reports',
            'slug' => 'reports',
            'priority' => 7,
        ]);

        $settings = Menu::create([
            'name' => 'Configuración',
            'icon' => 'cog-6-tooth', // Heroicon: cog-6-tooth
            'url' => '/settings',
            'slug' => 'settings',
            'priority' => 8,
        ]);

        // Submenús de Licencias
        Menu::create([
            'menu_id' => $licenses->id,
            'name' => 'Tipos de licencia',
            'icon' => 'tag', // Heroicon: tag
            'url' => '/licenses/types',
            'slug' => 'license-types',
            'priority' => 1,
        ]);

        Menu::create([
            'menu_id' => $licenses->id,
            'name' => 'Clases de licencia',
            'icon' => 'book-open', // Heroicon: squares-2x2 (ajustado)
            'url' => '/licenses/classes',
            'slug' => 'license-classes',
            'priority' => 2,
        ]);

        // Submenús de Auditorías
        Menu::create([
            'menu_id' => $audits->id,
            'name' => 'Planes de auditoría',
            'icon' => 'calendar-days', // Heroicon: calendar-days
            'url' => '/audits/plans',
            'slug' => 'audit-plans',
            'priority' => 1,
        ]);

        Menu::create([
            'menu_id' => $audits->id,
            'name' => 'Hallazgos',
            'icon' => 'exclamation-circle', // Heroicon: exclamation-circle
            'url' => '/audits/findings',
            'slug' => 'audit-findings',
            'priority' => 2,
        ]);

        Menu::create([
            'menu_id' => $audits->id,
            'name' => 'Acciones correctivas',
            'icon' => 'check-circle', // Heroicon: check-circle
            'url' => '/audits/actions',
            'slug' => 'audit-actions',
            'priority' => 3,
        ]);
    }
}