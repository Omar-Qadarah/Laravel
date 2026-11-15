<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Catigore;
use App\Models\Seller;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()->count(30)->create(function () {
            return [
                'cat_id' => Catigore::inRandomOrder()->value('id'),
                'seller_id' => Seller::inRandomOrder()->value('id'),
            ];
        });
    }
}