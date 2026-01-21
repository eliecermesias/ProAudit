<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use App\Models\LicenseType;
use App\Models\LicenseClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\License>
 */
class LicenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::inRandomOrder()->first()?->id,
            'user_id' => User::inRandomOrder()->first()?->id,
            'license_type_id' => LicenseType::inRandomOrder()->first()?->id,
            'license_class_id' => LicenseClass::inRandomOrder()->first()?->id,
            'starts_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year'),
            'max_users' => $this->faker->randomElement([10, 25, 50]),
            'modules_enabled' => $this->faker->randomElements(
                ['auditorias', 'reportes', 'normas'],
                $this->faker->numberBetween(1, 3)
            ),
            'is_active' => $this->faker->boolean(80),
            'license_key' => hash('sha256', uniqid().time().rand()),
        ];

    }
}
