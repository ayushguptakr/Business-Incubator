<?php

namespace Database\Factories;

use App\Models\FundingOpportunity;
use App\Models\Incubator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
class FundingOpportunityFactory extends Factory
{
    protected $model = FundingOpportunity::class;

    public function definition(): array
    {
        $faker = Faker::create('en_US');
        return [
            'title' => $faker->randomElement([
                'Seed Funding for Startups', 
                'Early Stage Investment Opportunity', 
                'Tech Innovation Grants', 
                'Sustainability Investment Fund', 
                'AI Research & Development Grant', 
                'GreenTech Funding Program', 
                'Healthcare Innovation Funding', 
                'Smart City Project Grant', 
                'Blockchain Startup Funding', 
                'Women Entrepreneurs Funding', 
                'Youth Entrepreneurship Grant', 
                'Business Growth Fund', 
                'Clean Energy Investment Opportunity', 
                'Global Expansion Fund', 
                'Venture Capital for Tech Startups', 
                'Scale-Up Accelerator Grant'
            ]),
            'description' => $faker->randomElement([
                'This funding opportunity aims to support early-stage startups with innovative technologies that have the potential to scale. We provide seed funding to help businesses achieve their initial milestones and reach product-market fit.',
                'Our program focuses on innovative green technologies aimed at creating sustainable solutions. The funding will help startups working in the clean energy, eco-friendly products, and renewable resources sectors.',
                'We provide grants to startups focusing on cutting-edge artificial intelligence research and development. This funding will support the development of AI-driven products and services to solve complex global challenges.',
                'Aimed at supporting women entrepreneurs, this fund offers seed capital to innovative businesses founded by women in the technology and healthcare sectors.',
                'The Smart City Project Grant supports startups that are working to develop solutions that can improve urban living through technology. We are looking for projects in the areas of IoT, data analytics, and smart infrastructure.',
                'Our funding is focused on the healthcare sector, supporting startups developing innovative solutions to improve health outcomes. We encourage projects in telemedicine, health apps, wearable tech, and medical devices.',
                'This funding opportunity is designed to support ventures working on innovative solutions in the blockchain space. If your startup is developing decentralized applications or innovative blockchain technologies, we want to hear from you.',
                'The Youth Entrepreneurship Grant aims to help young entrepreneurs (ages 18-35) build and scale their startups. This grant is focused on supporting fresh, innovative ideas in the technology and education sectors.',
                'The Business Growth Fund is dedicated to helping businesses scale. If your startup has achieved product-market fit and is now looking to expand, we offer funding to accelerate your growth and market penetration.',
                'We are offering funding for startups working on scalable technologies that can expand globally. This opportunity is for businesses that are looking to take their innovative products to international markets.',
                'Our Clean Tech Funding Program supports startups focused on energy efficiency, waste management, and sustainable manufacturing processes. The goal is to help reduce the environmental impact of various industries.'
            ]),
            'amount' => $faker->randomFloat(2, 10000, 50000),
            'deadline' => $faker->dateTimeBetween('now', '+6 months'),
            'incubator_id' => \App\Models\Incubator::factory(),
        ];
    }
}
