<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Mentor\Entities\Mentor;
use App\Domain\Mentor\Repositories\MentorRepositoryInterface;
use App\Domain\Mentor\Factories\MentorEntityFactoryInterface;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Collection;

class MentorRepository implements MentorRepositoryInterface
{
    public function __construct(
        private ConnectionInterface $db,
        private MentorEntityFactoryInterface $entityFactory
    ) {}

    public function findAll(): Collection
    {
        $records = $this->db->table('mentors')
            ->where('availability', '!=', 'paused')
            ->orderBy('created_at', 'desc')
            ->get();

        return $records->map(fn ($r) => $this->toEntity($r));
    }

    public function findById(int $id): ?Mentor
    {
        $record = $this->db->table('mentors')->where('id', $id)->first();

        return $record ? $this->toEntity($record) : null;
    }

    private function toEntity(array $record): Mentor
    {
        return $this->entityFactory->from([
            'id' => $record['id'],
            'title' => $record['title'],
            'expertise' => json_decode($record['expertise'], true),
            'availability' => $record['availability'],
            'avatar' => $record['avatar'] ?? null,
            'bio' => $record['bio'] ?? null
        ]);
    }
}