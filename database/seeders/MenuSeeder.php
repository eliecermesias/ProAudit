<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Menús principales
        $mainMenus = [
            ['name' => 'Dashboard',  'icon' => 'home', 'url' => '/dashboard', 'roles' => ['superadmin', 'auditor', 'developer']],
            ['name' => 'Audits',     'icon' => 'clipboard-document-check', 'url' => '/auditor/Audits', 'roles' => ['auditor']],
            ['name' => 'Advisory',   'icon' => 'user-group', 'url' => '#', 'roles' => ['advisor']],
            ['name' => 'Consulting', 'icon' => 'briefcase', 'url' => '#', 'roles' => ['consultant']],
            ['name' => 'Reports',    'icon' => 'chart-bar', 'url' => '#', 'roles' => ['auditor', 'superadmin']],
            ['name' => 'Settings',   'icon' => 'cog-6-tooth', 'url' => '#', 'roles' => ['superadmin']],
            ['name' => 'Companies',  'icon' => 'building-office', 'url' => '/superadmin/companies', 'roles' => ['superadmin']],
            ['name' => 'Licenses',   'icon' => 'key', 'url' => '/superadmin/licenses', 'roles' => ['superadmin']],
        ];

        $menuMap = [];

        foreach ($mainMenus as $menu) {
            $menuMap[$menu['name']] = Menu::updateOrCreate(
                ['name' => $menu['name']], // condición única
                [
                    'icon' => $menu['icon'],
                    'url' => $menu['url'],
                    'roles' => json_encode($menu['roles']),
                ]
            );
        }

        // Submenús agrupados por padre
        $subMenus = [
            'Audits' => [
                ['name' => 'Auditors', 'icon' => 'users', 'url' => '/auditor/Auditors', 'roles' => ['auditor']],
                ['name' => 'Audit Plan', 'icon' => 'calendar-days', 'url' => '/auditor/Audit Plan', 'roles' => ['auditor']],
                ['name' => 'Sessions', 'icon' => 'clock', 'url' => '/auditor/Sessions', 'roles' => ['auditor']],
                ['name' => 'Findings', 'icon' => 'exclamation-circle', 'url' => '/auditor/Findings', 'roles' => ['auditor']],
                ['name' => 'Evidence', 'icon' => 'photo', 'url' => '/auditor/Evidence', 'roles' => ['auditor']],
            ],
            'Advisory' => [
                ['name' => 'Implementation Plan', 'icon' => 'document-check', 'url' => '/advisor/Implementation Plan', 'roles' => ['advisor']],
                ['name' => 'Moments', 'icon' => 'sparkles', 'url' => '/advisor/Moments', 'roles' => ['advisor']],
                ['name' => 'Socialization', 'icon' => 'users', 'url' => '/advisor/Socialization', 'roles' => ['advisor']],
                ['name' => 'Recommendations', 'icon' => 'light-bulb', 'url' => '/advisor/Recommendations', 'roles' => ['advisor']],
                ['name' => 'Resolution', 'icon' => 'check-circle', 'url' => '/advisor/Resolution', 'roles' => ['advisor']],
                ['name' => 'Minutes', 'icon' => 'document-text', 'url' => '/advisor/Minutes', 'roles' => ['advisor']],
            ],
            'Consulting' => [
                ['name' => 'Audits', 'icon' => 'clipboard', 'url' => '/consulting/Audits', 'roles' => ['consultant']],
                ['name' => 'Consulting', 'icon' => 'briefcase', 'url' => '/consulting/Consulting', 'roles' => ['consultant']],
                ['name' => 'Praise', 'icon' => 'hand-thumb-up', 'url' => '/consulting/Praise', 'roles' => ['consultant']],
            ],
            'Reports' => [
                ['name' => 'Audit', 'icon' => 'magnifying-glass', 'url' => '/reports/Audit', 'roles' => ['auditor', 'superadmin']],
                ['name' => 'Operational', 'icon' => 'presentation-chart-line', 'url' => '/reports/Operational', 'roles' => ['auditor', 'superadmin']],
                ['name' => 'Technical', 'icon' => 'cpu-chip', 'url' => '/reports/Technical', 'roles' => ['auditor', 'superadmin']],
            ],
            'Settings' => [
                ['name' => 'Standards', 'icon' => 'scale', 'url' => '/settings/Standards', 'roles' => ['superadmin']],
                ['name' => 'Types of Audit', 'icon' => 'adjustments-horizontal', 'url' => '/settings/Types of Audit', 'roles' => ['admin']],
                ['name' => 'Types of Auditing', 'icon' => 'adjustments-vertical', 'url' => '/settings/Types of Auditing', 'roles' => ['admin']],
                ['name' => 'Type of Auditor', 'icon' => 'user', 'url' => '/settings/Type of Auditor', 'roles' => ['admin']],
                ['name' => 'Type of Advisor', 'icon' => 'user-group', 'url' => '/settings/Type of Advisor', 'roles' => ['admin']],
                ['name' => 'Type of Consultant', 'icon' => 'briefcase', 'url' => '/settings/Type of Consultant', 'roles' => ['admin']],
            ],
        ];

        foreach ($subMenus as $parentName => $items) {
            $parentId = $menuMap[$parentName]->id;
            foreach ($items as $item) {
                Menu::updateOrCreate(
                    ['name' => $item['name'], 'menu_id' => $parentId],
                    [
                        'icon' => $item['icon'],
                        'url' => $item['url'],
                        'roles' => json_encode($item['roles']),
                    ]
                );
            }
        }
    }
}
