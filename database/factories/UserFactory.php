<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            // $a = $a ? $a : $b; // ternary operator
            // $a = $a ?: $b; // elvis operator
            // $a ??= $b; //null coalescing operator
            'remember_token' => Str::random(10),
        ];
        // App\Models\User::factory(10)->create(); 
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
        // App\Models\User::factory(5)->unverified()->create(); 

    }

    // public function admin(): static
    // {
    //     return $this->state(fn(array $attributes) => [
    //         'is_admin' => true,
    //     ]);
    //     // App\Models\User::factory(3)->admin()->create();
    // }
}
