<?php

namespace Database\Factories\Product;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->name([
                'Product'.fake()->unique()->numberBetween(1, 100),
            ]),
            'price' => fake()->randomFloat(2, 10, 150),
            'status' => fake()->boolean(),
            'type' => fake()->randomElement(['goods', 'services']),
            'user_id' => User::all()->random()->id,
        ];
    }
}
