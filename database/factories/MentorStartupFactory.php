<?php

namespace Database\Factories;

use App\Models\MentorStartup;
use App\Models\Mentor;
use App\Models\Startup;
use Illuminate\Database\Eloquent\Factories\Factory;

class MentorStartupFactory extends Factory
{
    protected $model = MentorStartup::class;

    public function definition(): array
    {
        return [
            'mentor_id' => \App\Models\Mentor::factory(),
            'startup_id' => \App\Models\Startup::factory(),
        ];
    }
}
