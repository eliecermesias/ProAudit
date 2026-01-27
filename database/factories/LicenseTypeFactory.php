<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LicenseType>
 */
class LicenseTypeFactory extends Factory
{
    public function definition(): array
    {
        $type = $this->faker->randomElement([
            ['name' => 'Licencia Empresa', 'scope' => 'company'],
            ['name' => 'Licencia Usuario', 'scope' => 'user'],
        ]);

        return [
            'name' => $type['name'],
            'scope' => $type['scope'],
            'description' => $this->faker->sentence(),
        ];
    }

}
