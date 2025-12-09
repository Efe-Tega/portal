<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAuthController extends Controller
{
    public function showTeacherLogin()
    {
        return view('auth.teacher-login');
    }

    public function teacherLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $remember = $request->filled('remember');
        $teacher = Teacher::where('email', $request->email)->first();

        if (!$teacher) {
            return back()->withErrors([
                'email' => 'No account found with this email'
            ])->withInput($request->only('email'));
        }

        if (Auth::guard('teacher')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/teacher/dashboard');
        }

        return back()->withErrors([
            'password' => 'Incorrect email or password'
        ])->withInput($request->only('email'));
    }

    public function teacherDashboard()
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $totalStudents = User::whereIn(
            'class_id',
            TeacherClass::where('teacher_id', $teacherId)->pluck('class_id')
        )->count();

        $classCount = TeacherClass::where('teacher_id', $teacherId)->count();

        return view('teacher.index', compact('totalStudents', 'classCount'));
    }

    public function teacherLogout(Request $request)
    {
        Auth::guard('teacher')->logout();
        $request->session()->regenerateToken();

        return redirect('/teacher/login');
    }
}
