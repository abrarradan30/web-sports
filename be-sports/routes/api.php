<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\GaleriController;

Route::post('/login', [UsersController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UsersController::class, 'profile']);
    Route::post('/logout', [UsersController::class, 'logout']);
});

Route::apiResource('/galeri', GaleriController::class);

