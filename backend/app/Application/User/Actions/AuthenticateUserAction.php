<?php

namespace App\Application\User\Actions;

use App\Domain\User\Entities\User;
use App\Application\User\DTOs\LoginUserDTO;
use App\Domain\User\Repositories\UserRepositoryInterface;

class AuthenticateUserAction
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function execute(LoginUserDTO $dto): User
    {
        
    }
}