<?php

use App\Http\Controllers\Admin\StudentManagement;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')
    ->middleware('admin.auth')->group(function () {
        // Authentication
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('dashboard');
        });

        // Student Mangemenet
        Route::controller(StudentManagement::class)->group(function () {
            Route::get('/all/students', 'allStudents')->name('all_students');

            Route::post('/import/student', 'importStudents')->name('import.students');
        });
    });
