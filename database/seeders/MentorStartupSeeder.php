<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorStartupSeeder extends Seeder
{
    public function run(): void
    {
        // Insert data into the mentor_startup pivot table
        DB::table('mentor_startup')->insert([
            [
                'mentor_id' => 1,
                'startup_id' => 1,
            ],
            [
                'mentor_id' => 2,
                'startup_id' => 2,
            ],
            // Add more rows as needed
        ]);
    }
}
