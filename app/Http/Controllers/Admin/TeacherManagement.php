<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EduClass;
use App\Models\Teacher;
use App\Models\TeacherClass;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherManagement extends Controller
{
    public function allTeachers(Request $request)
    {
        $query = Teacher::with('classes');
        $classes = EduClass::all();


        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $teachers = $query->paginate(10)->withQueryString();

        $unassigned = [];
        foreach ($teachers as $teacher) {
            $assignedIds = $teacher->classes->pluck('id')->toArray();
            // $classes is a Collection, use whereNotIn to filter
            $available = $classes->whereNotIn('id', $assignedIds)->values();
            $unassigned[$teacher->id] = $available;
        }

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.teacher.partials.table-rows', compact('teachers'))->render(),
            ]);
        }

        return view('admin.teacher.index', compact('teachers', 'classes', 'unassigned'));
    }

    public function assignClasses(Request $request)
    {
        TeacherClass::create([
            'teacher_id' => $request->teacher_id,
            'class_id' => $request->class_id,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function unassignClass(Teacher $teacher, EduClass $class)
    {
        $teacher->classes()->detach($class->id);
        session()->flash('success', 'Class unassigned');
        return redirect()->back();
    }
}
