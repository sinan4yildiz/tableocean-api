<?php

use App\Http\Controllers\Guest\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('auth')->controller(AuthController::class)->middleware([])->group(function () {

    Route::post('/login', 'login')->middleware([/*'throttle:5,5'*/]);
    Route::post('/logout', 'logout')->middleware(['auth:sanctum', 'auth.guest']);

});