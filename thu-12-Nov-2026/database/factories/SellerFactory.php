<?php

namespace Database\Factories;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Seller>
 */
class SellerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'shop_name' => fake()->company(),
        ];
    }
}
