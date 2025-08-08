<?php

namespace App\Application\User\DTOs;

class LoginUserDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password
    ) {}
}