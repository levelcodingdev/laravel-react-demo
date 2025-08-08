<?php

namespace App\Application\Mentor\Queries;

use Illuminate\Support\Collection;
use Illuminate\Database\ConnectionInterface;
use App\Application\Mentor\DTOs\MentorProfileDTO;

class GetMentorsWithUsersQuery
{
    public function __construct(private ConnectionInterface $db) {}

    /**
     * Fetch the list of mentors with user data.
     *
     * @return Collection<int, MentorListDto>
     */
    public function execute(): Collection
    {
        return $this->db->table('mentors')
            ->join('users', 'mentors.user_id', '=', 'users.id')
            ->where('mentors.availability', '!=', 'paused')
            ->orderBy('mentors.created_at', 'desc')
            ->select([
                'mentors.id',
                'mentors.title',
                'mentors.expertise',
                'mentors.availability',
                'mentors.avatar as mentor_avatar',
                'mentors.bio',
                'mentors.technical_bio',
                'mentors.mentoring_style',
                'mentors.audience',
                'users.first_name',
                'users.last_name',
                'users.email',
            ])
            ->get()
            ->map(function ($row) {
                return new MentorProfileDTO(
                    id: $row->id,
                    title: $row->title,
                    fullName: "$row->first_name $row->last_name",
                    avatar: $row->mentor_avatar ?? null,
                    expertise: json_decode($row->expertise, true),
                    availability: $row->availability,
                    bio: $row->bio,
                    technicalBio: $row->technical_bio,
                    mentoringStyle: $row->mentoring_style,
                    audience: $row->audience,
                    email: $row->email,
                );
            });
    }
}