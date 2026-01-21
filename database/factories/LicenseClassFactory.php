<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LicenseClass>
 */
class LicenseClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Basic', 'Standard', 'Premium']),
            'description' => $this->faker->sentence(),
            'default_max_users' => $this->faker->randomElement([10, 25, 50]),
            'default_modules' => json_encode($this->faker->randomElements(
                ['auditorias', 'reportes', 'normas'],
                $this->faker->numberBetween(1, 3)
            )),
            'default_duration_months' => $this->faker->randomElement([6, 12, 24]),
        ];
    }
}
