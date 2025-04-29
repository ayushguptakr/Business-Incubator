<?php

namespace Database\Factories;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class MentorFactory extends Factory
{
    protected $model = Mentor::class;

    public function definition(): array
    {   
        $faker = Faker::create('en_US');
        return [
            'name' => $faker->randomElement([
                'John Smith', 
                'Sarah Johnson', 
                'David Williams', 
                'Emma Brown', 
                'James Taylor', 
                'Olivia Lee', 
                'William Harris', 
                'Sophia Clark', 
                'Lucas Moore', 
                'Mia Walker', 
                'Daniel Perez', 
                'Isabella White', 
                'Ethan Martinez', 
                'Amelia Davis', 
                'Alexander Garcia', 
                'Charlotte Rodriguez', 
                'Benjamin Wilson'
            ]),
            'bio' => $faker->randomElement([
                'With over 20 years of experience in the tech industry, I specialize in AI and machine learning. I have worked with several startups to help them scale their products and achieve their business goals.',
                'A passionate entrepreneur, I have successfully launched and scaled multiple businesses in the fintech space. My expertise lies in helping startups navigate through complex financial landscapes and secure investments.',
                'I have a background in sustainable energy and have spent the last 15 years helping startups in the clean tech sector. My goal is to assist innovators in creating eco-friendly solutions that can make a global impact.',
                'As a seasoned marketer with over 12 years of experience, I specialize in digital marketing strategies for tech startups. I help startups grow their brand, increase customer acquisition, and build long-term relationships with clients.',
                'I’m an experienced product manager with a strong background in tech development. Over the years, I’ve guided several startups in building user-centered products that delight customers while achieving growth metrics.',
                'Having founded and sold several companies in the e-commerce space, I focus on mentoring startups looking to enter the online retail market. My expertise includes supply chain management, growth strategies, and customer experience.',
                'With a deep understanding of the healthcare ecosystem, I guide healthtech startups through the development and scaling of their products. My goal is to empower entrepreneurs to improve patient outcomes and drive innovation in the healthcare sector.',
                'I specialize in blockchain technology and have helped multiple startups build decentralized applications (DApps). My focus is on helping teams understand blockchain’s potential and develop sustainable projects in this space.',
                'I am a serial entrepreneur with expertise in scaling startups. I work with teams to refine their business models, optimize operations, and unlock funding opportunities for sustained growth and success.',
                'With 15 years of experience in the software development industry, I mentor startups in creating scalable and secure applications. My focus is on guiding teams through the technical challenges of building robust software platforms.',
                'I have a strong background in business development and sales, having worked in both the tech and consumer goods industries. My expertise is in helping startups establish a go-to-market strategy and secure key partnerships.',
                'Having worked in the education sector for over 10 years, I guide edtech startups on how to create impactful learning solutions. I help entrepreneurs design scalable educational products and navigate through the challenges of this sector.',
                'I am a professional advisor with expertise in mergers and acquisitions. I have helped startups navigate complex business transitions and grow their companies into strong market contenders.'
            ]),
            'expertise' => $faker->randomElement([
                'Business Strategy', 
                'Entrepreneurship', 
                'Product Development', 
                'Marketing Strategy', 
                'Technology Consulting', 
                'Digital Transformation', 
                'Venture Capital', 
                'Data Science', 
                'Financial Management', 
                'Sales and Marketing', 
                'Artificial Intelligence', 
                'Blockchain Technologies', 
                'Project Management', 
                'Sustainability Solutions', 
                'Cybersecurity', 
                'E-commerce Development'
            ]),
            'linkedin' => $faker->url(),
            'user_id' => User::factory(),
        ];
    }
}
