<?php

namespace Database\Factories;

use App\Models\Incubator;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
class IncubatorFactory extends Factory
{
    protected $model = Incubator::class;

    public function definition(): array
    {   
        $faker = Faker::create('en_US');
        return [
            'name' => $faker->randomElement([
                'TechLaunch Hub', 
                'InnoVenture Labs', 
                'StartUp Factory', 
                'GreenTech Incubator', 
                'FutureFoundry', 
                'ScaleUp Studios', 
                'Innovation Forge', 
                'Business Catalyst Hub', 
                'The Startup Garage', 
                'LaunchPoint Incubator', 
                'The Founders’ Lab', 
                'SeedSpace Accelerator', 
                'Creative Spark', 
                'Visionary Ventures', 
                'Momentum Labs', 
                'The Idea Vault'
            ]),
            'description' => $faker->randomElement([
                'We provide a collaborative workspace, mentorship, and funding opportunities for early-stage startups looking to scale. Our mission is to empower entrepreneurs with the resources they need to bring their innovative ideas to life.',
                'Our incubator is dedicated to nurturing startups in the fields of renewable energy, technology, and sustainability. We offer guidance, office space, and access to investors to help businesses grow sustainably.',
                'Focused on innovation in the tech sector, we offer a dynamic environment for tech startups to collaborate, innovate, and scale. With a focus on AI, blockchain, and IoT, we help startups build disruptive solutions.',
                'We help aspiring entrepreneurs turn their business ideas into successful ventures. Through a combination of mentorship, funding, and networking, we accelerate startups in diverse industries, from fintech to healthtech.',
                'Our incubator provides an ecosystem for startups to develop innovative solutions in the healthcare and wellness space. We offer product development support, funding, and partnerships with industry leaders.',
                'We are committed to supporting social impact startups. Our incubator helps entrepreneurs who are focused on creating solutions that address societal issues like poverty, education, and healthcare.',
                'Located in the heart of Silicon Valley, we offer world-class mentorship and resources to startups in various sectors, including fintech, e-commerce, and clean tech. Our focus is on scaling businesses and preparing them for international expansion.',
                'A cutting-edge incubator for digital health startups, we provide entrepreneurs with the tools they need to develop and launch their health-related products. From R&D to clinical trials, we offer end-to-end support.',
                'Our incubator program is designed for startups focused on digital transformation. We support businesses that are revolutionizing industries like retail, logistics, and education with new technologies and digital solutions.',
                'We specialize in supporting food tech startups looking to innovate in the food industry. Whether its plant-based foods, sustainable packaging, or food delivery solutions, our incubator helps entrepreneurs scale their ideas with the right resources and funding.',
                'We work with startups in the fintech space, offering funding, mentorship, and access to a network of industry experts. Our mission is to help fintech startups develop innovative solutions to improve the financial services industry.',
                'Supporting startups with a focus on sustainability, our incubator program helps entrepreneurs build businesses that prioritize environmental responsibility. From green tech to eco-friendly consumer products, we guide startups on their sustainability journey.'
            ]),
            'location' => $faker->randomElement([
                'San Francisco, CA', 
                'New York, NY', 
                'Austin, TX', 
                'Los Angeles, CA', 
                'Chicago, IL', 
                'Boston, MA', 
                'London, UK', 
                'Berlin, Germany', 
                'Sydney, Australia', 
                'Toronto, Canada', 
                'Bangalore, India', 
                'Singapore', 
                'Dubai, UAE', 
                'Paris, France', 
                'Amsterdam, Netherlands', 
                'Stockholm, Sweden'
            ]),
            'website' => $faker->url(),
            'user_id' => User::factory(),
        ];
    }
}
