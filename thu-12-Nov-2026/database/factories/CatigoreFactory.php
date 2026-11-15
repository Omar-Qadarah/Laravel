<?php

namespace Database\Factories;

use App\Models\Catigore;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Catigore>
 */
class CatigoreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'description' => fake()->paragraph(),
            'image' => null,
            'status' => fake()->boolean(),
        ];
    }
}