<?php

use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\ClassManagement;
use App\Http\Controllers\Teacher\GradeInputController;
use App\Models\ImportProgress;
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
        Route::get('/teacher/attendance/counts', 'counts')->name('teacher.attendance.counts');

        Route::post('/teacher/attendance/store', 'storeAttendance')->name('teacher.attendance.store');
        Route::post('/teacher/attendance/mark-all', 'markAll')->name('teacher.attendance.markAll');
    });

    // Grades Input Controller
    Route::controller(GradeInputController::class)->group(function () {
        Route::get('/student/grades', 'studentGrades')->name('teacher.grade-input');
        Route::get('/teacher/get_subjects/{classId}', 'getSubjects');
        Route::get('/teacher/scores/preview', 'scoresPreview')->name('teacher.scores.preview');
        Route::get('/teacher/scores/stats', 'scoreStatistics')->name('teacher.scores.stats');

        Route::get('/import-progress/{progress}', function (ImportProgress $progress) {
            $percentage = $progress->total_rows > 0
                ? round(($progress->processed_rows / $progress->total_rows) * 100)
                : 0;

            return response()->json([
                'status' => $progress->status,
                'percentage' => $percentage,
                'error' => $progress->error
            ]);
        });

        Route::post('/teacher/import_scores', 'importScores')->name('teacher.import.scores');
        Route::post('/teacher/calculate_grades', 'calculateGrades')->name('teacher.calculate.grades');
    });
});
