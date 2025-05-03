<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GaleriController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UsersController;

// route untuk user
Route::post('/login', [UsersController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UsersController::class, 'profile']);
    Route::post('/logout', [UsersController::class, 'logout']);
    Route::put('/update', [UsersController::class, 'update']);
    Route::delete('/delete', [UsersController::class, 'destroy']);
});

// route untuk galeri
Route::apiResource('/galeri', GaleriController::class);

// route untuk review
Route::apiResource('/review', ReviewController::class);