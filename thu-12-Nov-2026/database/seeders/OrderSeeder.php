<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::factory()->count(30)->create(function () {
            return [
                'user_id' => User::inRandomOrder()->value('id'),
            ];
        });
    }
}