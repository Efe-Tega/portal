<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherManagement extends Controller
{
    public function teacherDashboard()
    {
        return view('teacher.index');
    }
}
