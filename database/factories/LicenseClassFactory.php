<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LicenseClassFactory extends Factory
{
    public function definition(): array
    {
        $options = [
            [
                'name' => 'Basic',
                'default_max_users' => 10,
                'default_modules' => json_encode(['auditorias']),
                'default_duration_months' => 6,
            ],
            [
                'name' => 'Standard',
                'default_max_users' => 25,
                'default_modules' => json_encode(['auditorias', 'reportes']),
                'default_duration_months' => 12,
            ],
            [
                'name' => 'Premium',
                'default_max_users' => 50,
                'default_modules' => json_encode(['auditorias', 'reportes', 'normas']),
                'default_duration_months' => 24,
            ],
        ];

        $choice = $this->faker->randomElement($options);

        return [
            'name' => $choice['name'],
            'description' => $this->faker->sentence(),
            'default_max_users' => $choice['default_max_users'],
            'default_modules' => $choice['default_modules'],
            'default_duration_months' => $choice['default_duration_months'],
        ];
    }
}