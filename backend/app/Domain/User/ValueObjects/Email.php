<?php

namespace App\Domain\User\ValueObjects;

use InvalidArgumentException;

class Email
{
    public function __construct(private string $value)
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email: {$value}");
        }
        $this->value = strtolower(trim($value));
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }
}