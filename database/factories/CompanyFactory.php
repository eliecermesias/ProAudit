<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),
            'nit' => $this->faker->unique()->numerify('#########'),
            'email' => $this->faker->companyEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'logo' => $this->faker->imageUrl(200, 200, 'business', true, 'logo'),
            'description' => $this->faker->sentence(10),
            'contact_name' => $this->faker->name(), // 👈 corregido
        ];
    }
}