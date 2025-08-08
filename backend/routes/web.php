<?php

use Illuminate\Support\Facades\Route;
use App\Infrastructure\Http\Controllers\API\User\MeController;
use App\Infrastructure\Http\Controllers\API\User\LoginController;
use App\Infrastructure\Http\Controllers\API\User\LogoutController;
use App\Infrastructure\Http\Controllers\API\User\RegisterController;
use App\Infrastructure\Http\Controllers\API\Mentor\MentorListController;
use App\Infrastructure\Http\Controllers\API\Mentor\MentorProfileController;

Route::get('/', function () {
    return view('welcome');
});

