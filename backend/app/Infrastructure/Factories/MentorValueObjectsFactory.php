<?php

namespace App\Infrastructure\Factories;

use App\Domain\Mentor\ValueObjects\ExpertiseList;
use App\Domain\User\ValueObjects\MentorValueObjectsFactoryInterface;

class MentorValueObjectsFactory implements MentorValueObjectsFactoryInterface
{
    public function expertiseList(array $value): ExpertiseList
    {
        return new ExpertiseList($value);
    }
}