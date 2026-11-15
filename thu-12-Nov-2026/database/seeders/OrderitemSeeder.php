<?php

namespace Database\Seeders;

use App\Models\Orderitem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderitemSeeder extends Seeder
{
    public function run(): void
    {
        Orderitem::factory()->count(60)->create(function () {
            return [
                'order_id' => Order::inRandomOrder()->value('id'),
                'product_id' => Product::inRandomOrder()->value('id'),
            ];
        });
    }
}