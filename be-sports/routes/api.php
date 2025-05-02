<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\GaleriController;
use App\Http\Controllers\Api\KategoriOlahragaController;
use App\Http\Controllers\Api\ProdukOlahragaController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\KontakController;

Route::post('/login', [UsersController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UsersController::class, 'profile']);
    Route::post('/logout', [UsersController::class, 'logout']);
});

Route::apiResource('/galeri', GaleriController::class);

Route::apiResource('kategori-olahraga', KategoriOlahragaController::class);

Route::apiResource('produk-olahraga', ProdukOlahragaController::class);

Route::apiResource('berita', BeritaController::class);

Route::apiResource('kontak', KontakController::class);

