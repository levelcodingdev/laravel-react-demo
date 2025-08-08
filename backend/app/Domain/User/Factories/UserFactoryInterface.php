<?php

namespace App\Domain\User\Factories;

use App\Application\User\DTOs\UserDTO;
use App\Domain\User\Entities\User;

interface UserFactoryInterface
{
    public function from(object|array $data): Entity;
}