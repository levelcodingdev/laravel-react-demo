<?php

namespace App\Domain\Mentor\ValueObjects;

use InvalidArgumentException;

class ExpertiseList
{
    public function __construct(private array $items)
    {
        if (empty($items)) {
            throw new InvalidArgumentException('Expertise list cannot be empty.');
        }
        $this->items = array_map('trim', $items);
    }

    public function items(): array
    {
        return $this->items;
    }

    public function contains(string $skill): bool
    {
        return in_array($skill, $this->items, true);
    }
}