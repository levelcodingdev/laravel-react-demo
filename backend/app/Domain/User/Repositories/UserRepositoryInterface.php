<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;
use App\Domain\User\ValueObjects\Email;

interface UserRepositoryInterface
{
    public function create(array $data): User;
    public function findByEmail(Email $email): ?User;
    public function findById(int $id): ?User;
}