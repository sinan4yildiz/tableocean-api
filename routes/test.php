<?php

/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    \Illuminate\Support\Facades\Mail::to('test@test.com')->queue(new \App\Mail\TestEmail());

    return 'test';
});