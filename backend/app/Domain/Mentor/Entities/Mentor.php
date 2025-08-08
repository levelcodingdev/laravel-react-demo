<?php

namespace App\Domain\Mentor\Entities;

use App\Domain\Mentor\ValueObjects\ExpertiseList;
use App\Domain\Mentor\Enums\Availability;

class Mentor
{
    public function __construct(
        private int $id,
        private string $name,
        private string $title,
        private ExpertiseList $expertise,
        private Availability $availability,
        private ?string $avatar = null,
        private string $bio,
        private string $technicalBio,
        private string $mentoringStyle,
    ) {}

    public function id(): int { return $this->id; }
    public function name(): string { return $this->name; }
    public function title(): string { return $this->title; }
    public function expertise(): ExpertiseList { return $this->expertise; }
    public function availability(): Availability { return $this->availability; }
    public function avatar(): ?string { return $this->avatar; }
    public function bio(): ?string { return $this->bio; }
    public function getTechnicalBio(): ?string { return $this->technicalBio; }
    public function getMentoringStyle(): ?string { return $this->mentoringStyle; }

    public function isAvailable(): bool
    {
        return $this->availability === Availability::Available;
    }
}