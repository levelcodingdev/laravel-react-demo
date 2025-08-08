<?php

namespace App\Infrastructure\Http\Controllers\API\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Application\User\Resources\UserResource;
use App\Infrastructure\Http\Controllers\Controller;

class MeController extends Controller
{    
    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();

        if (! $user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        return UserResource::make($user)->response();
    }
}