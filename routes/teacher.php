<?php

use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\Teacher\ClassManagement;
use Illuminate\Support\Facades\Route;

Route::middleware('teacher.auth')->group(function () {
    // Authentication
    Route::controller(TeacherAuthController::class)->group(function () {
        Route::get('/teacher/dashboard', 'teacherDashboard')->name('teacher.dashboard');
        Route::get('/teacher/logout', 'teacherLogout')->name('teacher.logout');
    });

    // Class Management
    Route::controller(ClassManagement::class)->group(function () {
        Route::get('/teacher/my_classes', 'teacherClasses')->name('teacher.classes');
    });
});
