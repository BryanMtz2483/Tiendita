<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rfc' => fake()->md5(),
            'name' => fake()->unique()->name(),
            'phone' => 1234,
            'email' => fake()->email(),
            'manager_name' => fake()->name(),
            'address' => fake()->streetAddress(),
        ];
    }
}
