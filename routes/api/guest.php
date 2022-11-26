<?php

use App\Http\Controllers\Guest\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('auth')->controller(AuthController::class)->middleware([])->group(function () {

    /*
     * Any auth status
     * */
    Route::post('/login', 'login')->middleware(['throttle:5,5']);

    /*
     * Authenticated
     * */
    Route::middleware(['auth:sanctum', 'auth.guest'])->group(function () {
        Route::post('/logout', 'logout');
    });

    /*
     * Guest
     * */
    Route::middleware(['guest:sanctum'])->group(function () {
    });

});