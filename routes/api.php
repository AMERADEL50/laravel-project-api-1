<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('forget-password', 'forget_password');
    });


Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('auth')
        ->controller(AuthController::class)
        ->group(function () {
            Route::post('reset-password', 'reset_password');
        });


    // Posts Routes
    require_once __DIR__ . '/api/posts.php';

    // Users Routes
    require_once __DIR__ . '/api/users.php';

    // replies
    require_once __DIR__ . '/api/replies.php';
});
