<?php

namespace App\Domain\Mentor\Repositories;

use App\Application\Mentor\DTOs\MentorDTO;
use Illuminate\Support\Collection;

interface MentorRepositoryInterface
{
    public function findAll(): Collection;
    public function findById(int $id): ?MentorDTO;
}