<?php

namespace App\Infrastructure\Factories;

use App\Application\User\DTOs\UserDTO;
use App\Domain\User\ValueObjects\UserValueObjectsFactoryInterface;

class UserFactory
{
    public function __construct(
        private readonly UserValueObjectsFactoryInterface $voFactory
    ) {}

    public function from(object|array $data): Entity
    {
        return new Entity(
            id: $record->id,
            first_name: $record->first_name,
            last_name: $record->last_name,
            email: $this->voFactory->email($record->email),
            password: $this->voFactory->password($record->password),
        );
    }
}