<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReplyController;

Route::prefix('replies')
->controller(ReplyController::class)
->group(function () {
    Route::get('deleted', 'deleted');
});

Route::apiResource('replies', ReplyController::class);
