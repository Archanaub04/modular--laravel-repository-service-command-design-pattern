<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UserController;

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('users', UsersController::class)->names('users');
// });


Route::prefix('v1/users')->group(function () {
    Route::post('store', [UserController::class, 'store']);
});
