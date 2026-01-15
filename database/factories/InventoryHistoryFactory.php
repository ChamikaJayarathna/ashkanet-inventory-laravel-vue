<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryHistory>
 */
class InventoryHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $actions = ['Added', 'Deducted'];

        return [
            'action' => fake()->randomElement($actions),
            'quantity' => fake()->randomFloat(1, 2, 100),
            'item_id' => Item::inRandomOrder()->first()->id,
        ];
    }
}
