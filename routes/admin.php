<?php

use App\Http\Controllers\Admin\StudentManagement;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')
    ->middleware('admin.auth')->group(function () {
        // Authentication
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('dashboard');
            Route::get('/logout', 'adminLogout')->name('logout');
        });

        // Student Mangemenet
        Route::controller(StudentManagement::class)->group(function () {
            Route::get('/all/students', 'allStudents')->name('students.all_students');
            Route::get('/add/student', 'addNewStudent')->name('students.add_student');

            Route::post('/import/student', 'importStudents')->name('import.students');
        });
    });
