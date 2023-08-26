<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company,
            'address' => fake()->address,
            'city' => fake()->city,
            'zip_code' => fake()->postcode,
            'country' => fake()->country,
            'email' => fake()->email,
            'phone_number' => fake()->phoneNumber,
            'registration_number' => fake()->unique()->randomNumber(6),
            'logo' => null, // You can modify this based on your needs
            'tax_rate' => fake()->randomFloat(2, 0, 30),
            'quote_validity_days' => fake()->randomNumber(2),
        ];
    }
}
