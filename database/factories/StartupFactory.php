<?php

namespace Database\Factories;

use App\Models\Startup;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
class StartupFactory extends Factory
{
    protected $model = Startup::class;

    public function definition(): array
    {   
        $faker = Faker::create('en_US');
        return [
            'name' => $faker->randomElement([
                'TechWave Solutions', 'GreenTech Innovations', 'SmartHealth', 'FinEdge', 'SkyHigh Ventures', 
                'InnoByte Labs', 'PureFoods', 'EcoSolutions', 'VisionaryTech', 'NextGen Automations', 
                'CloudLink Systems', 'Revamp Technologies', 'BrightMind Innovations', 'SustainableFuture', 
                'UrbanTech Solutions', 'FutureSmart Systems', 'TechNexus', 'PureEnergy Technologies'
            ]),
            'description' => $faker->randomElement([
                'We are a fast-growing fintech startup focused on simplifying personal finance management. Our platform provides users with real-time insights, budgeting tools, and investment opportunities to help them take control of their financial future.',
                'Our startup is on a mission to revolutionize the healthcare industry by providing affordable and accessible telemedicine services. We connect patients with top healthcare professionals through secure online consultations.',
                'We are a cutting-edge AI startup developing machine learning models that empower businesses to automate their operations and improve decision-making. Our platform integrates seamlessly with existing systems to drive efficiency and growth.',
                'Our e-commerce platform allows small businesses to easily set up online stores and reach customers globally. We provide a range of tools to help sellers manage inventory, process orders, and track sales performance.',
                'At our sustainable energy startup, we specialize in solar panel solutions for homes and businesses. We are dedicated to making clean energy affordable and accessible, helping our clients reduce their carbon footprint and energy costs.',
                'We are a team of innovators working on the next big thing in virtual reality. Our VR platform provides immersive experiences for education, gaming, and entertainment, creating new ways for people to interact with the world around them.',
                'Our startup is a cloud-based software that simplifies project management for remote teams. With powerful collaboration tools and real-time tracking, we help organizations improve productivity and communication, no matter where their team members are located.',
                'We are a tech-driven logistics company focused on optimizing supply chain operations for businesses. Our platform uses advanced algorithms to predict demand, reduce costs, and streamline inventory management, enabling businesses to operate more efficiently.',
                'At our clean-tech startup, we develop eco-friendly products aimed at reducing plastic waste. Our first product is a fully biodegradable packaging solution that can replace single-use plastics, helping businesses and consumers make more sustainable choices.',
                'Our edtech platform is revolutionizing the way students learn. We offer interactive courses in coding, data science, and artificial intelligence, enabling learners to acquire in-demand skills at their own pace with hands-on projects.',
                'We are a blockchain startup focused on developing decentralized applications for the finance industry. Our mission is to build secure, transparent, and scalable solutions that enhance trust and efficiency in financial transactions.',
                'Our social enterprise startup is focused on reducing food waste by redistributing surplus food from restaurants and supermarkets to local charities. We aim to tackle hunger and promote sustainability through our innovative platform.',
                'We are a next-gen automotive startup working on electric vehicles that are both affordable and sustainable. Our goal is to reduce the environmental impact of transportation by providing electric cars that are accessible to everyone.'
            ]),
            'industry' => $faker->randomElement([
                'Technology', 'Healthcare', 'Finance', 'E-commerce', 'Renewable Energy', 'Education', 
                'Real Estate', 'Artificial Intelligence', 'Blockchain', 'Sustainability', 'Cybersecurity', 
                'Logistics', 'Agriculture', 'Automotive', 'Clean Tech', 'Consumer Goods'
            ]),
            'stage' => $this->faker->randomElement(['Seed', 'Early Stage', 'Growth', 'Late Stage']),
            // 'logo' => 'storage\app\public\startups\logo.jpg',
    //         'logo' => 'startups/' . $this->faker->randomElement([
    // 'logo1.png', 'logo2.png', 'logo3.png'
// ]),
// 'logo' => 'startups/' . fake()->image(public_path('storage/startups'), 300, 300, null, false),

'logo' => $this->faker->randomElement([
    'https://console.kr-asia.com/wp-content/uploads/2019/04/The-Most-Important-Factors-for-Startup-Success_Open-Graph-Image.png',
    'https://wordpress.aaddress.in/wp-content/uploads/2024/07/Best-Startup-Business-Ideas-in-India.png',
    'https://cdn.prod.website-files.com/5a710020b54d350001949426/664b2297aece1636d65514b6_StartupCapital.webp',
    'https://pfablogs.s3.us-east-2.amazonaws.com/successful-startup-vortex.jpg',
    'https://www.wework.com/ideas/wp-content/uploads/sites/4/2017/06/Web_150DPI-20190927_10th_Floor_Conference_Room_2_v1.jpg?fit=1120%2C630',
    'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/TCS_SIPCOT_Building.jpg/1200px-TCS_SIPCOT_Building.jpg',
    'https://cdn.prod.website-files.com/670cbf146221ee06c3cdd761/6718ca31812eff77b60fb172_66cd73f72f756a2e5d226029_66cd729b81267feb588070c3_Mphasis.webp',
]),


            'user_id' => User::factory(),
            'incubator_id' => \App\Models\Incubator::factory(),
        ];
    }
}
