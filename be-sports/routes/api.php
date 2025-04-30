<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//posts
Route::apiResource('/user', App\Http\Controllers\Api\UserController::class);

Route::apiResource('/kategori', App\Http\Controllers\Api\KategoriController::class);
Route::apiResource('/produk', App\Http\Controllers\Api\ProdukController::class);
