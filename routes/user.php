<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Backend\GradeController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('auth')->group(function () {
    // Authentication
    Route::controller(UserAuthController::class)->group(function () {
        Route::get('/logout', 'userLogout')->name('user.logout');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'userDashboard')->name('user.dashboard');
    });

    Route::controller(GradeController::class)->group(function () {
        Route::get('/result-grades', 'grades')->name('user.grades');
    });
});
