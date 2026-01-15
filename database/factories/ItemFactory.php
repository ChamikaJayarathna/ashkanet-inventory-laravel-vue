<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $units = ['Kg', 'm', 'cm'];

        return [
            'name' => fake()->name(),
            'unit' => fake()->randomElement($units),
            'quantity' => fake()->randomFloat(2, 1, 100)
        ];
    }
}
