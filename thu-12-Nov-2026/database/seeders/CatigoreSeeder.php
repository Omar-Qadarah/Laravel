<?php

namespace Database\Seeders;

use App\Models\Catigore;
use Illuminate\Database\Seeder;

class CatigoreSeeder extends Seeder
{
    public function run(): void
    {
        Catigore::factory()->count(10)->create();
    }
}