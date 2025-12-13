<?php

use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\Teacher\AttendanceController;
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

    // Attendance Controller
    Route::controller(AttendanceController::class)->group(function () {
        Route::match(['get', 'post'], '/teacher/attendance', 'attendance')->name('teacher.attendance');

        // Ajax
        Route::get('/teacher/attendance/fetch', 'fetchAttendance')->name('teacher.attendance.fetch');
        Route::post('/teacher/attendance/store', 'storeAttendance')->name('teacher.attendance.store');
        Route::post('/teacher/attendance/mark-all', 'markAll')->name('teacher.attendance.markAll');
    });
});
