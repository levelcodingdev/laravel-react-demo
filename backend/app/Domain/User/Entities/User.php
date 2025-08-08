<?php

namespace App\Domain\User\Entities;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Password;

class User
{
    public function __construct(
        private int $id,
        private string $first_name,
        private string $last_name,
        private Email $email,
        private Password $password
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function firstName(): string
    {
        return $this->first_name;
    }

    public function lastName(): string
    {
        return $this->last_name;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): Password
    {
        return $this->password;
    }
}