<?php

namespace App\Application\User\Actions;

use App\Application\User\DTOs\RegisterUserDTO;
use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepositoryInterface;

class RegisterUserAction
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function execute(RegisterUserDTO $dto): User
    {
        
    }
}