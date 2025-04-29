<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incubator;

class IncubatorSeeder extends Seeder
{
    public function run(): void
    {
        Incubator::factory()->count(10)->create();
    }
}
