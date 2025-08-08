<?php

namespace App\Domain\User\ValueObjects;

use InvalidArgumentException;

class Password
{
    public function __construct(private string $value)
    {
        if (strlen($value) < 8) {
            throw new InvalidArgumentException('Password must be at least 8 characters.');
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function matches(string $plainText): bool
    {
        return password_verify($plainText, $this->value);
    }

    public static function hash(string $plainText): self
    {
        return new self(password_hash($plainText, PASSWORD_DEFAULT));
    }
}