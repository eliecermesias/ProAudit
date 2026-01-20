<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function withTwoFactor(): static
    {
        return $this->state(fn (array $attributes) => [
            'two_factor_secret' => encrypt('secret'),
            'two_factor_recovery_codes' => encrypt(json_encode(['recovery-code-1'])),
            'two_factor_confirmed_at' => now(),
        ]);
    }

    // 🔹 Estados para roles específicos
    public function administrador(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('Administrador');
        });
    }

    public function auditor(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('Auditor');
        });
    }

    public function asesor(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('Asesor');
        });
    }

    public function invitado(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('Invitado');
        });
    }

    public function desarrollador(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('Desarrollador');
        });
    }

    public function superadmin(): static
    {
        return $this->afterCreating(function (\App\Models\User $user) {
            // Asignar rol Desarrollador (todos los permisos)
            $user->assignRole('Desarrollador');

            // Marcarlo como superusuario en la base de datos
            // 👇 asegúrate de tener un campo 'is_superadmin' en la tabla users
            $user->update(['is_superadmin' => true]);
        });
    }
    
}