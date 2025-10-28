<?php

use App\Http\Controllers\Auth\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserAuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('user.login');

    Route::post('/login', 'userLogin')->name('login');
});


require __DIR__ . '/user.php';
