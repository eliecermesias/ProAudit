<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Menús principales (incluyendo Dashboard)
        $mainMenus = [
            ['name' => 'Dashboard',     'icon' => 'home',                       'url' => '/dashboard'],
            ['name' => 'Audits',        'icon' => 'clipboard-document-check',   'url' => '/auditor/Audits'],
            ['name' => 'Advisory',      'icon' => 'user-group',                 'url' => '#'],
            ['name' => 'Consulting',    'icon' => 'briefcase',                  'url' => '#'],
            ['name' => 'Reports',       'icon' => 'chart-bar',                  'url' => '#'],
            ['name' => 'Settings',      'icon' => 'cog-6-tooth',                'url' => '#'],
            ['name' => 'Companies',     'icon' => 'building-office',            'url' => '/superadmin/companies'],
            ['name' => 'Licenses',      'icon' => 'key',                        'url' => '/superadmin/licenses'],
        ];

        $menuMap = [];

        foreach ($mainMenus as $menu) {
            $menuMap[$menu['name']] = Menu::create([
                'name' => $menu['name'],
                'icon' => $menu['icon'],
                'url'  => $menu['url'],
            ]);
        }

        // Submenús agrupados por padre
        $subMenus = [
            'Audits' => [
                ['name' => 'Auditors',         'icon' => 'users',               'url' => '/auditor/Auditors'],
                ['name' => 'Audit Plan',       'icon' => 'calendar-days',       'url' => '/auditor/Audit Plan'],
                ['name' => 'Sessions',         'icon' => 'clock',               'url' => '/auditor/Sessions'],
                ['name' => 'Findings',         'icon' => 'exclamation-circle',  'url' => '/auditor/Findings'],
                ['name' => 'Evidence',         'icon' => 'photo',               'url' => '/auditor/Evidence'],
            ],
            'Advisory' => [
                ['name' => 'Implementation Plan', 'icon' => 'document-check',   'url' => '/advisor/Implementation Plan'],
                ['name' => 'Moments',             'icon' => 'sparkles',         'url' => '/advisor/Moments'],
                ['name' => 'Socialization',       'icon' => 'users',            'url' => '/advisor/Socialization'],
                ['name' => 'Recommendations',     'icon' => 'light-bulb',       'url' => '/advisor/Recommendations'],
                ['name' => 'Resolution',          'icon' => 'check-circle',     'url' => '/advisor/Resolution'],
                ['name' => 'Minutes',             'icon' => 'document-text',    'url' => '/advisor/Minutes'],
            ],
            'Consulting' => [
                ['name' => 'Audits',             'icon' => 'clipboard',         'url' => '/consulting/Audits'],
                ['name' => 'Consulting',         'icon' => 'briefcase',         'url' => '/consulting/Consulting'],
                ['name' => 'Praise',             'icon' => 'hand-thumb-up',     'url' => '/consulting/Praise'],
            ],
            'Reports' => [
                ['name' => 'Audit',              'icon' => 'magnifying-glass',  'url' => '/reports/Audit'],
                ['name' => 'Operational',        'icon' => 'presentation-chart-line', 'url' => '/reports/Operational'],
                ['name' => 'Technical',          'icon' => 'cpu-chip',          'url' => '/reports/Technical'],
            ],
            'Settings' => [
                ['name' => 'Standards',          'icon' => 'scale',             'url' => '/settings/Standards'],
                ['name' => 'Types of Audit',     'icon' => 'adjustments-horizontal', 'url' => '/settings/Types of Audit'],
                ['name' => 'Types of Auditing',  'icon' => 'adjustments-vertical',   'url' => '/settings/Types of Auditing'],
                ['name' => 'Type of Auditor',    'icon' => 'user',              'url' => '/settings/Type of Auditor'],
                ['name' => 'Type of Advisor',    'icon' => 'user-group',        'url' => '/settings/Type of Advisor'],
                ['name' => 'Type of Consultant', 'icon' => 'briefcase',         'url' => '/settings/Type of Consultant'],
            ],
        ];

        foreach ($subMenus as $parentName => $items) {
            $parentId = $menuMap[$parentName]->id;
            foreach ($items as $item) {
                Menu::create([
                    'name'     => $item['name'],
                    'icon'     => $item['icon'],
                    'url'      => $item['url'],
                    'menu_id'  => $parentId,
                ]);
            }
        }
    }
}