<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserAuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('user.login');
    Route::post('/login', 'userLogin')->name('login');
});

Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/admin/login', 'showAdminLogin')->name('admin.show.login');
    Route::post('/admin/login', 'adminLogin')->name('admin.login');
});

// Country/State/Cities Routes
Route::controller(CountryController::class)->group(function () {
    Route::get('/get-states/{country_id}', 'getStates');
    Route::get('/get-lgas', 'getLocalGovt');
});


require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';
