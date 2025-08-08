<?php

namespace App\Infrastructure\Factories;

use App\Application\Mentor\DTOs\MentorDTO;
use App\Domain\Mentor\Entities\Mentor;
use App\Domain\Mentor\Enums\Availability;
use App\Domain\Mentor\Factories\MentorFactoryInterface;
use App\Domain\Mentor\ValueObjects\ExpertiseList;

class MentorFactory implements MentorFactoryInterface
{
    public function from(object|array $data): Mentor
    {
        return new Mentor(
            id: $record->id,
            title: $record->title,
            expertise: new ExpertiseList(json_decode($record->expertise, true)),
            availability: Availability::from($data->availability),
            avatar: $record->avatar,
            bio: $record->bio
        );
    }
}