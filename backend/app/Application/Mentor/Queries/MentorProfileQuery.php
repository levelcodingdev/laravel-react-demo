<?php

namespace App\Application\Mentor\Queries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\ConnectionInterface;
use App\Application\Mentor\DTOs\MentorProfileDTO;

class MentorProfileQuery
{
    public function __construct(private ConnectionInterface $db) {}

    public function execute(int $mentorId): ?MentorProfileDTO
    {
        $record = $this->db->table('mentors')
            ->join('users', 'mentors.user_id', '=', 'users.id')
            ->where('mentors.id', $mentorId)
            ->where('mentors.availability', '!=', 'paused') // only active
            ->select([
                'mentors.id as mentor_id',
                'users.first_name',
                'users.last_name',
                'users.email',
                'mentors.title',
                'mentors.bio',
                'mentors.technical_bio',
                'mentors.mentoring_style',
                'mentors.audience',
                'mentors.avatar as mentor_avatar',
                'mentors.expertise',
                'mentors.availability',
                'mentors.created_at as mentor_created_at',
            ])
            ->first();

        if (! $record) {
            return null;
        }

        return new MentorProfileDTO(
            id: $record->mentor_id,
            fullName: $record->first_name . ' ' . $record->last_name,
            email: $record->email,
            title: $record->title,
            bio: $record->bio,
            technicalBio: $record->technical_bio,
            mentoringStyle: $record->mentoring_style,
            audience: $record->audience,
            avatar: $record->mentor_avatar ?? $record->user_avatar,
            expertise: json_decode($record->expertise, true),
            availability: $record->availability,
        );
    }
}