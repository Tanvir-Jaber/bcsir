<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'first_name'        => fake()->name(),
            'last_name'         => fake()->name(),
            'username'          => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'user_type'         => rand(1,3),
            'status'            => 1,
            'email_verified_at' => now(),
            'password'          => Hash::make('123123'),
            'remember_token'    => Str::random(10),
            'created_at'        => now(),
            'updated_at'        => now(),
        ];
    }

    
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
