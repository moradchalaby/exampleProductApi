<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'api_token' => 'your-access-token', // 'test-token
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::factory(10)->create();


        \App\Models\Product\Product::factory()->create([
            'name' => 'Test Product',
            'price' => 10.99,
            'status' => 1,
            'type' => 'goods',
            'user_id' => 1,
        ]);
        \App\Models\Product\Product::factory(20)->create();

        \App\Models\Product\ProductAction::factory()->create([
            'product_id' => 1,
            'user_id' => 1,
            'action' => 'created',
            'data' => json_encode(Product::find(1)->toArray())
        ]);
        \App\Models\Product\ProductAction::factory(20)->create();
    }
}
