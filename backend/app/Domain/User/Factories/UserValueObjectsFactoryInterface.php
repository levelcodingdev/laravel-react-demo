<?php

namespace App\Domain\User\Factories;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Password;

interface UserValueObjectsFactoryInterface
{
    public function email(string $value): Email;
    public function password(string $value): Password;
}