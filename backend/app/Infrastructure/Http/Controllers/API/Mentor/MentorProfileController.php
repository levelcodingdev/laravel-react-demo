<?php

namespace App\Infrastructure\Http\Controllers\API\Mentor;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Infrastructure\Http\Controllers\Controller;
use App\Application\Mentor\Queries\MentorProfileQuery;
use App\Application\Mentor\Queries\GetMentorsWithUsersQuery;

class MentorProfileController extends Controller
{    
    public function __invoke(MentorProfileQuery $query, int $id): JsonResponse
    {
        $mentor = $query->execute($id);

        return response()->json(['data' => $mentor ?? null]);
    }
}