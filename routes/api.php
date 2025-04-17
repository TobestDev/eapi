<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController; // ✅ Import ReviewController

// ✅ Authenticated user route
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// ✅ RESTful Product routes
Route::apiResource('products', ProductController::class);

// ✅ Nested review routes under products
Route::group(['prefix' => 'products'], function () {
    Route::apiResource('{product}/reviews', ReviewController::class);
});
