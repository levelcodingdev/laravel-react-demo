<?php

namespace App\Application\Mentor\DTOs;

readonly class MentorProfileDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public string $fullName,
        public ?string $avatar,
        public array $expertise,
        public string $availability,
        public string $bio,
        public string $email,
        public string $technicalBio,
        public string $mentoringStyle,
        public string $audience,
    ) {}
}