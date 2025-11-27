<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherManagement extends Controller
{
    public function teacherDashboard()
    {
        return view('teacher.index');
    }

    public function teacherLogout(Request $request)
    {
        Auth::guard('teacher')->logout();
        $request->session()->regenerateToken();

        return redirect('/teacher/login');
    }
}
