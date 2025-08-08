<?php
namespace Database\Factories;

use Illuminate\Support\Facades\DB;

class UserDatabaseFactory
{
    public function create(array $overrides = []): int
    {
        $firstName = $overrides['first_name'] ?? fake()->firstName();
        $lastName = $overrides['last_name'] ?? fake()->lastName();

        $data = array_merge([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $overrides['email'] ?? strtolower("{$firstName}.{$lastName}") . '@example.com',
            'password' => $overrides['password'] ?? bcrypt('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ], $overrides);

        return DB::table('users')->insertGetId($data);
    }
}