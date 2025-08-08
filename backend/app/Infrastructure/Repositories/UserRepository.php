<?php

namespace App\Infrastructure\Repositories;

use App\Domain\User\Entities\User;
use App\Domain\User\ValueObjects\Email;
use Illuminate\Database\ConnectionInterface;
use App\Infrastructure\Factories\UserFactory;
use App\Domain\User\Factories\UserEntityFactoryInterface;
use App\Domain\User\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private ConnectionInterface $db,
        private UserEntityFactoryInterface $userFactory,
        private UserFactory $dataMapper
    ) {}

    /**
     * Create a new user in the database
     */
    public function create(User $user): User
    {
        $id = $this->db->table('users')->insertGetId([
            'first_name' => $user->firstName(),
            'last_name' => $user->lastName(),
            'email' => $user->email()->value(),
            'password' => $user->password()->value(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $this->findById($id);
    }

    /**
     * Find user by email
     */
    public function findByEmail(Email $email): ?User
    {
        $record = $this->db->table('users')->where('email', $email->value())->first();

        if (! $record) {
            return null;
        }

        return $this->userFactory->from($record);
    }

    /**
     * Find user by ID
     */
    public function findById(int $id): ?User
    {
        $record = $this->db->table('users')->where('id', $id)->first();

        if (! $record) {
            return null;
        }

        return $this->userFactory->from($record);
    }
}