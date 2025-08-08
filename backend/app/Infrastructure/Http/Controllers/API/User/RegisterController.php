<?php

namespace App\Infrastructure\Http\Controllers\API\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Application\User\DTOs\RegisterUserDTO;
use App\Application\User\Resources\UserResource;
use App\Infrastructure\Http\Controllers\Controller;
use App\Application\User\Actions\RegisterUserAction;
use App\Infrastructure\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function __construct(
        private readonly RegisterUserAction $registerUserAction
    ) {}

    public function __invoke(
        RegisterRequest $request,
    ): JsonResponse {

        $user = $this->registerUserAction->execute($request->dto());

        return response()->json([
            'message' => 'User registered successfully',
        ], 201);
    }
}