<?php

use App\Http\Controllers\Client\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('auth')->controller(AuthController::class)->middleware([])->group(function () {

    Route::post('/login', 'login')->middleware([/*'throttle:5,5'*/]);
    Route::post('/logout', 'logout')->middleware(['auth:sanctum', 'auth.client']);

});