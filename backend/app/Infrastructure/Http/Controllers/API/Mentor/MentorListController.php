<?php

namespace App\Infrastructure\Http\Controllers\API\Mentor;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Infrastructure\Http\Controllers\Controller;
use App\Application\Mentor\Queries\GetMentorsWithUsersQuery;

class MentorListController extends Controller
{    
    public function __invoke(GetMentorsWithUsersQuery $query): JsonResponse
    {
       $mentors = $query->execute();

        return response()->json([
            'data' => $mentors,
            'total' => $mentors->count(),
        ]);
    }
}