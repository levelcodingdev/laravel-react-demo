<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Infrastructure\Http\Controllers\API\User\MeController;
use App\Infrastructure\Http\Controllers\API\User\LoginController;
use App\Infrastructure\Http\Controllers\API\User\LogoutController;
use App\Infrastructure\Http\Controllers\API\User\RegisterController;
use App\Infrastructure\Http\Controllers\API\Mentor\MentorListController;
use App\Infrastructure\Http\Controllers\API\Mentor\MentorProfileController;

// we can have the api routes here, no issue
Route::prefix('v1')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('/register', RegisterController::class);
        Route::post('/login', LoginController::class);
        Route::get('/mentors', MentorListController::class);
        Route::get('/mentors/{id}', MentorProfileController::class);
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', MeController::class);
        Route::post('/logout', LogoutController::class);
    });
});