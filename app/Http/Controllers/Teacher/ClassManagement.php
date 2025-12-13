<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\EduClass;
use App\Models\Student;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassManagement extends Controller
{
    public function teacherClasses(Request $request)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $classIds = TeacherClass::where('teacher_id', $teacherId)->pluck('class_id');
        $classes = EduClass::whereIn('id', $classIds)->get();
        $selectedClassId = $request->class_id ?? $classes->first()->id;

        $query = User::with('class');
        $students = $query->where('class_id', $selectedClassId)->paginate(10)->withQueryString();
        $studentClass = EduClass::where('id', $selectedClassId)->first();

        return view('teacher.classes.index', compact('classes', 'students', 'selectedClassId', 'studentClass'));
    }
}
