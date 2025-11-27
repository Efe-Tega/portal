<?php

use App\Http\Controllers\Admin\TeacherManagement;
use Illuminate\Support\Facades\Route;

Route::middleware('teacher.auth')
    ->controller(TeacherManagement::class)->group(function () {
        Route::get('/teacher/dashboard', 'teacherDashboard')->name('teacher.dashboard');
    });
