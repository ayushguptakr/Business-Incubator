<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Startup;
use App\Models\FundingOpportunity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition(): array
    {
        $faker = Faker::create('en_US');
        return [
            'proposal' => $faker->paragraph(3),
            'status' => $faker->randomElement(['pending', 'accepted', 'rejected']),
            'startup_id' => \App\Models\Startup::factory(),
            'funding_opportunity_id' => \App\Models\FundingOpportunity::factory(),
        ];
    }
}
