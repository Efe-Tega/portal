<?php

use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('admin.auth')->group(function () {
        // Authentication
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('admin.dashboard');
        });
    });
