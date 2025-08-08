<?php

namespace App\Application\Mentor\DTOs;

readonly class MentorDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public array $expertise,
        public string $availability,
        public ?string $avatar = null,
        public string $bio,
        public string $technicalBio,
        public string $mentoringStyle,
        public string $audience,
    ) {}
}