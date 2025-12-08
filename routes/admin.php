<?php

use App\Http\Controllers\Admin\StudentManagement;
use App\Http\Controllers\Admin\TeacherManagement;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\CountryController;
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
            Route::get('/student/profile/{id}/{name}', 'studentProfile')->name('student.profile');
            Route::get('/delete/student/{id}', 'deleteStudent')->name('delete.student');
            Route::get('/edit/student/{id}/{name}', 'editStudent')->name('edit.student');
            Route::get('/class/{id}/school', 'getSchool');

            Route::post('/import/student', 'importStudents')->name('import.students');
            Route::post('/create/student', 'registerNewStudent')->name('create.new_student');
            Route::post('/update/student', 'updateStudent')->name('update.student');
        });

        // TeacherManagement
        Route::controller(TeacherManagement::class)->group(function () {
            Route::get('/teachers', 'allTeachers')->name('teachers.all_teachers');
            Route::get('/add/teacher', 'addNewTeacher')->name('teachers.add_teacher');

            Route::post('/assign/classes', 'assignClasses')->name('assign.classes');
            Route::delete('/teachers/{teacher}/classes/{class}', 'unassignClass')->name('unassign.class');
        });
    });
