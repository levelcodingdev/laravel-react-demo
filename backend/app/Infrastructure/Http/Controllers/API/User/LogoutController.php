<?php

namespace App\Infrastructure\Http\Controllers\API\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Infrastructure\Http\Controllers\Controller;

class LogoutController extends Controller
{    
    public function __invoke(Request $request): JsonResponse
    {
        \Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out']);
    }
}