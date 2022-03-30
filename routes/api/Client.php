<?php

use App\Http\Controllers\Client\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('auth')->controller(LoginController::class)->middleware([])->group(function () {

    Route::post('/login', 'index')->middleware(['guest:sanctum'/*, 'throttle:5,5'*/]);

});
