<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassManagement extends Controller
{
    public function teacherClasses()
    {
        return view('teacher.classes.index');
    }
}
