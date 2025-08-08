<?php

namespace App\Infrastructure\Factories;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Password;
use App\Domain\User\ValueObjects\UserValueObjectsFactoryInterface;

class UserValueObjectsFactory implements UserValueObjectsFactoryInterface
{
    public function email(string $value): Email
    {
        return new Email($value);
    }

    public function password(string $value): Password
    {
        return new Password($value);
    }
}