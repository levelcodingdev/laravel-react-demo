<?php

namespace App\Domain\Mentor\Factories;

use App\Domain\Mentor\ValueObjects\ExpertiseList;

interface MentorValueObjectsFactoryInterface
{
    public function expertiseList(array $value): ExpertiseList;
}