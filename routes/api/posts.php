<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;


Route::prefix('posts')
    ->controller(PostController::class)
    ->group(function () {

        Route::get('/pending', 'pending');

        Route::get('/canceled', 'canceled');

        Route::get('/deleted', 'deleted');

        Route::patch('/restore/{post}', 'restore');

        Route::put('/approve/{post}', 'approve');


        Route::get('/', 'index');

        Route::get('{post}', 'show');

        Route::put('{post}', 'update');

        Route::delete('{post}', 'destroy');

    });


// Route::apiResource('posts', PostController::class);
