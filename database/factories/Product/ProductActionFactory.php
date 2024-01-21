<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductAction>
 */
class ProductActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = \App\Models\Product\Product::all()->random();
        return [
            'product_id' => $product->id,
            'action' => $this->faker->randomElement(['create']),
            'user_id' => $product->user->id,
            'data' => json_encode($product->toArray())


        ];
    }
}
