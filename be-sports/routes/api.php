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



Route::get('/galeri', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

<<<<<<< HEAD
//posts
Route::apiResource('/user', App\Http\Controllers\Api\UserController::class);

Route::apiResource('/kategori', App\Http\Controllers\Api\KategoriController::class);
Route::apiResource('/produk', App\Http\Controllers\Api\ProdukController::class);
=======
Route::apiResource('/galeri', GaleriController::class);
Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit']);
Route::put('/galeri/{id}', [GaleriController::class, 'update']);
Route::delete('/galeri/{id}', [GaleriController::class, 'destroy']);

>>>>>>> 932c5326fe709e158678bf40b844344abf084f92
