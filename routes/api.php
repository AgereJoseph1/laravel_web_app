<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Version 1 of the API
Route::prefix('v1')->group(function () {
    // Authentication route
    Route::post('/login', [UserDataController::class, 'authenticate']);

    // Protected routes (authentication required)
    Route::middleware('auth:sanctum')->group(function () {
        // Users routes
        Route::get('/users/{id}', [UserDataController::class, 'getUserById']);
        Route::get('/users', [UserDataController::class, 'getAllUsers']);
    });
});

