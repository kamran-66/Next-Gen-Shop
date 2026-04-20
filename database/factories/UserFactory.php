<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->userName() . rand(1,9999) . 'example.com',
            'password' => Hash::make('password'),
            'role' => fake()->randomElement(['customer', 'admin']),
        ];
    }
}