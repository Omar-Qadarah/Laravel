<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::doesntHave('seller')
            ->inRandomOrder()
            ->take(10)
            ->get();

        foreach ($users as $user) {
            Seller::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}