<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EduClass;
use App\Models\School;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubjectManagement extends Controller
{
    public function subjects()
    {
        $classes = EduClass::all();
        $schools = School::all();
        $teachers = Teacher::all();
        $subjectsByClass = Subject::with('class')->get()->groupBy('class_id');

        return view('admin.subjects.index', compact(
            'classes',
            'schools',
            'teachers',
            'subjectsByClass'
        ));
    }

    public function registerSubject(Request $request)
    {
        $request->validate([
            'subject_name' => 'required',
            'class_id' => 'required',
            'school_id' => 'required',
            'teacher_id' => 'required',
            'duration' => 'required',
        ], [
            'class_id.required' => 'Please select a class',
            'school_id.required' => 'Select a school',
            'teacher_id.required' => 'Select a teacher',
        ]);

        $subject_name = ucwords($request->subject_name);
        $class_id = $request->class_id;

        $exists = Subject::where('name', $subject_name)
            ->where('class_id', $class_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('warning', 'Subject already exists for selected class');
        }

        Subject::insert([
            'name' => $subject_name,
            'class_id' => $class_id,
            'school_id' => $request->school_id,
            'duration' => $request->duration,
            'created_at' => Carbon::now()
        ]);

        TeacherClass::insert([
            'class_id' => $class_id,
            'teacher_id' => $request->teacher_id,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Subject Registered');
    }
}
