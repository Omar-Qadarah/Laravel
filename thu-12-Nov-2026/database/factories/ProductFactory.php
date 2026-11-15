<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Catigore;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cat_id' => Catigore::factory(),
            'seller_id' => Seller::factory(),
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'image' => null,
            'quantity' => fake()->numberBetween(1, 100),
            'price' => fake()->randomFloat(2, 1, 500),
        ];
    }
}
