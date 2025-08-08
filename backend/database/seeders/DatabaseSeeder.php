<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\UserDatabaseFactory;
use Database\Factories\MentorDatabaseFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userFactory = new UserDatabaseFactory();
        $mentorFactory = new MentorDatabaseFactory();

        $mentorsData = [
            [
                'first_name' => 'Sarah',
                'last_name' => 'Johnson',
                'title' => 'Senior Laravel Developer',
                'expertise' => ['laravel', 'php', 'testing', 'ddd'],
                'availability' => 'open',
                'avatar' => 'https://randomuser.me/api/portraits/men/45.jpg',
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Chen',
                'title' => 'Full-Stack Engineer & Mentor',
                'expertise' => ['vue', 'javascript', 'api', 'architecture'],
                'availability' => 'open',
                'avatar' => 'https://randomuser.me/api/portraits/women/45.jpg',
            ],
            [
                'first_name' => 'Amina',
                'last_name' => 'Khalid',
                'title' => 'Backend Specialist',
                'expertise' => ['php', 'symfony', 'laravel', 'microservices'],
                'availability' => 'limited',
                'avatar' => 'https://randomuser.me/api/portraits/men/45.jpg',
            ],
            [
                'first_name' => 'James',
                'last_name' => 'Wilson',
                'title' => 'DevOps & Laravel CI/CD',
                'expertise' => ['docker', 'ci/cd', 'aws', 'deployment'],
                'availability' => 'open',
                'avatar' => 'https://randomuser.me/api/portraits/men/45.jpg',
            ],
            [
                'first_name' => 'Elena',
                'last_name' => 'Martinez',
                'title' => 'UX Engineer & Mentor',
                'expertise' => ['ux', 'figma', 'tailwind', 'frontend'],
                'availability' => 'limited',
                'avatar' => 'https://randomuser.me/api/portraits/men/45.jpg',
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Park',
                'title' => 'Laravel Educator',
                'expertise' => ['teaching', 'laravel', 'best practices', 'security'],
                'availability' => 'open',
                'avatar' => 'https://randomuser.me/api/portraits/women/45.jpg',
            ],
        ];

        foreach ($mentorsData as $data) {
            $userId = $userFactory->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
            ]);

            $mentorFactory->create([
                'user_id' => $userId,
                'title' => $data['title'],
                'expertise' => json_encode($data['expertise']),
                'availability' => $data['availability'],
                'avatar' => $data['avatar']
            ]);
        }
    }
}
