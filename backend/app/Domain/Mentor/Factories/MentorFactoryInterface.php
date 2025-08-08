<?php

namespace App\Domain\Mentor\Factories;

use App\Domain\Mentor\Entities\Mentor;

interface MentorFactoryInterface
{
    public function from(object|array $data): Mentor;
}