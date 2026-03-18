<?php

use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::apiResource('restaurants', RestaurantController::class);

    Route::post('restaurants/{restaurantId}/menu_items', [MenuItemController::class, 'store']);
    Route::get('restaurants/{restaurantId}/menu_items', [MenuItemController::class, 'index']);
    Route::put('menu_items/{id}', [MenuItemController::class, 'update']);
    Route::delete('menu_items/{id}', [MenuItemController::class, 'destroy']);
});
