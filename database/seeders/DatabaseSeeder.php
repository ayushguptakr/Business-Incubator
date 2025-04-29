<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Startup;
use App\Models\Incubator;
use App\Models\Mentor;
use App\Models\FundingOpportunity;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 incubators
        $incubators = Incubator::factory(10)->create();

        // Create 30 startups and assign them randomly to incubators
        $startups = Startup::factory(30)->make()->each(function ($startup) use ($incubators) {
            $startup->incubator_id = $incubators->random()->id;
            $startup->save();
        });

        // Create 20 mentors
        $mentors = Mentor::factory(20)->create();

        // Attach mentors to random startups (Many-to-Many relationship if you have pivot table 'mentor_startup')
        foreach ($mentors as $mentor) {
            $mentor->startups()->attach(
                $startups->random(rand(1, 3))->pluck('id')->toArray()
            );
        }

        // Create 15 funding opportunities linked to random incubators
        FundingOpportunity::factory(15)->make()->each(function ($funding) use ($incubators) {
            $funding->incubator_id = $incubators->random()->id;
            $funding->save();
        });
    }
}
