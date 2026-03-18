<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('restaurants', RestaurantController::class);

    Route::post('restaurants/{restaurantId}/menu_items', [MenuItemController::class, 'store']);
    Route::get('restaurants/{restaurantId}/menu_items', [MenuItemController::class, 'index']);
    Route::put('menu_items/{id}', [MenuItemController::class, 'update']);
    Route::delete('menu_items/{id}', [MenuItemController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
