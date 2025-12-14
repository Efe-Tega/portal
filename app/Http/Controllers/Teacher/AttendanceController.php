<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\EduClass;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    public function attendance(Request $request)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $classIds = TeacherClass::where('teacher_id', $teacherId)->pluck('class_id');
        $classes = EduClass::whereIn('id', $classIds)->get();

        $selectedClassId = $request->class_id ?? $classes->first()->id;

        $students = User::where('class_id', $selectedClassId)
            ->paginate(10)
            ->withQueryString();

        $attendanceDate = $request->attendance_date ?? now()->format('Y-m-d');

        return view('teacher.attendance.index', compact('classes', 'attendanceDate', 'students', 'selectedClassId'));
    }

    public function storeAttendance(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'student_id' => 'required|exists:users,id',
            'status' => 'required|in:present,absent,late',
            'attendance_date' => 'required|date',
        ]);

        $teacherId = Auth::guard('teacher')->user()->id;

        $attendance = Attendance::updateOrCreate(
            [
                'student_id' => $request->student_id,
                'teacher_id' => $teacherId,
                'attendance_date' => $request->attendance_date,
            ],
            [
                'class_id' => $request->class_id,
                'status' => $request->status,
                'remark' => $request->remark ?? null,
            ]
        );

        return response()->json(['success' => true, 'attendance' => $attendance, 'message' => 'Attendance saved successfully']);
    }

    public function fetchAttendance(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'attendance_date' => 'required|date',
        ]);

        $teacherId = Auth::guard('teacher')->user()->id;
        $classIds = TeacherClass::where('teacher_id', $teacherId)->pluck('class_id');

        abort_unless($classIds->contains($request->class_id), 403);
        $students = User::where('class_id', $request->class_id)->get();
        $attendance = Attendance::whereIn('student_id', $students->pluck('id'))
            ->where('attendance_date', $request->attendance_date)
            ->pluck('status', 'student_id')
            ->toArray();

        $remarks = Attendance::whereIn('student_id', $students->pluck('id'))
            ->where('attendance_date', $request->attendance_date)
            ->pluck('remark', 'student_id')
            ->toArray();

        return response()->json([
            'students' => $students,
            'attendance' => $attendance,
            'remarks' => $remarks,
        ]);
    }

    public function counts(Request $request)
    {

        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'attendance_date' => 'required|date',
        ]);

        $classId = $request->class_id;
        $date = $request->attendance_date;

        $counts = Attendance::where('class_id', $classId)
            ->where('attendance_date', $date)->get();
        $present = $counts->where('status', 'present')->count();
        $absent = $counts->where('status', 'absent')->count();
        $late = $counts->where('status', 'late')->count();

        return response()->json([
            'present' => $present,
            'absent' => $absent,
            'late' => $late
        ]);
    }

    public function markAll(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        $teacherId = Auth::guard('teacher')->user()->id;
        $classId = $request->class_id;
        $date = $request->attendance_date;
        $status = $request->status;

        $students = User::where('class_id', $classId)->pluck('id');

        foreach ($students as $studentId) {
            Attendance::updateOrCreate(
                [
                    'teacher_id' => $teacherId,
                    'student_id' => $studentId,
                    'class_id' => $classId,
                    'attendance_date' => $date,
                ],
                [
                    'status' => $status,
                ]
            );
        }

        return response()->json(['message' => 'Attendance marked for all students']);
    }
}
