<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
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
}
