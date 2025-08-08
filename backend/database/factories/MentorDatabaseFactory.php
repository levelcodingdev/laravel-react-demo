<?php
namespace Database\Factories;

use Illuminate\Support\Facades\DB;

class MentorDatabaseFactory
{
    public function create(array $overrides = []): int
    {
        $data = array_merge([
            'user_id' => $overrides['user_id'] ?? throw new \InvalidArgumentException('user_id is required'),
            'title' => fake()->jobTitle(),
            'bio' => fake()->paragraph(3),
            'technical_bio' => fake()->paragraph(3),
            'mentoring_style' => fake()->paragraph(3),
            'audience' => fake()->paragraph(3),
            'avatar' => fake()->optional(0.7)->imageUrl(300, 300, 'people'),
            'expertise' => json_encode(fake()->words(random_int(3, 6))),
            'availability' => fake()->randomElement(['open', 'limited']),
            'created_at' => now(),
            'updated_at' => now(),
        ], $overrides);

        return DB::table('mentors')->insertGetId($data);
    }
}