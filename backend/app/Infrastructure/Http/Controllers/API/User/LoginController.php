<?php

namespace App\Infrastructure\Http\Controllers\API\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Application\User\DTOs\LoginUserDTO;
use App\Application\User\Resources\UserResource;
use App\Infrastructure\Requests\LoginRequest;
use App\Infrastructure\Http\Controllers\Controller;
use App\Application\User\Actions\AuthenticateUserAction;

class LoginController extends Controller
{
    public function __construct(
        private readonly AuthenticateUserAction $authAction
    ) {}

    public function __invoke(
        LoginRequest $request
    ): JsonResponse {
        $user = $authAction->execute($request->dto());

        // Start session
        \Auth::loginUsingId($user->id());

        return UserResource::make($user)->response();
    }
}