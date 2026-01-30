<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Jobs\ImportScoresJob;
use App\Models\AcademicYear;
use App\Models\EduClass;
use App\Models\Exam;
use App\Models\ImportProgress;
use App\Models\Student;
use App\Models\StudentRecordScore;
use App\Models\Subject;
use App\Models\TeacherClass;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GradeInputController extends Controller
{
    public function getSubjects($class_id)
    {
        $subjects = Subject::where('class_id', $class_id)->get();
        return response()->json($subjects);
    }

    public function studentGrades()
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $classIds = TeacherClass::where('teacher_id', $teacherId)->pluck('class_id');
        $classes = EduClass::whereIn('id', $classIds)->get();
        $terms = Term::all();
        $years = AcademicYear::all();
        $examType = Exam::all();

        return view('teacher.grade-input', compact(
            'classes',
            'terms',
            'examType',
            'years'
        ));
    }

    public function importScores(Request $request)
    {
        $request->validate([
            'excelFile' => 'required|mimes:xlsx,xls',
            'class_id' => 'required',
            'term_id' => 'required',
            'exam_id' => 'required',
            'subject_id' => 'required',
            'year_id' => 'required',
        ]);

        $relativePath = $request->file('excelFile')->store('imports');
        $progress = ImportProgress::create([
            'imported_by' => auth('teacher')->id(),
            'importer_type' => 'teacher',
            'status' => 'pending'
        ]);

        ImportScoresJob::dispatch(
            $relativePath,
            $request->only([
                'class_id',
                'term_id',
                'exam_id',
                'subject_id',
                'year_id'
            ]),
            $progress
        );

        return response()->json([
            'progress_id' => $progress->id
        ]);
    }

    public function scoresPreview(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'term_id' => 'required',
            'exam_id' => 'required',
            'subject_id' => 'required',
            'year_id' => 'required',
        ]);

        $students = User::where('class_id', $request->class_id)
            ->paginate(10);

        $scores = StudentRecordScore::where([
            'class_id' => $request->class_id,
            'term_id' => $request->term_id,
            'exam_id' => $request->exam_id,
            'subject_id' => $request->subject_id,
            'year_id' => $request->year_id,
        ])
            ->whereIn('user_id', $students->pluck('id'))
            ->get()
            ->keyBy('user_id');

        $rows = $students->getCollection()->map(function ($student) use ($scores) {
            $record = $scores->get($student->id);

            return [
                'name' => fullname($student->lastname, $student->middlename, $student->firstname),
                'reg_no' => $student->registration_number,
                'score' => $record->correct_answer ?? null,
            ];
        });

        return response()->json([
            'students' => $rows,
            'current_page' => $students->currentPage(),
            'last_page' => $students->lastPage(),
            'total' => $students->total(),
        ]);
    }

    public function scoreStatistics(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'term_id' => 'required',
            'exam_id' => 'required',
            'subject_id' => 'required',
            'year_id' => 'required',
        ]);

        $query = StudentRecordScore::where([
            'class_id' => $request->class_id,
            'term_id' => $request->term_id,
            'exam_id' => $request->exam_id,
            'subject_id' => $request->subject_id,
            'year_id' => $request->year_id,
        ])->whereNotNull('correct_answer');

        return response()->json([
            'average' => round($query->avg('correct_answer'), 2),
            'highest' => $query->max('correct_answer'),
            'lowest' => $query->min('correct_answer'),
        ]);
    }

    // public function calculateGrades(Request $request)
    // {
    //     $request->validate([
    //         'class_id' => 'required',
    //         'term_id' => 'required',
    //         'exam_id' => 'required',
    //         'subject_id' => 'required',
    //         'year_id' => 'required',
    //     ]);

    //     $exam = Exam::findOrFail($request->exam_id);
    //     $maxMarks = $exam->total_marks;

    //     // fetch scores
    //     $records = StudentRecordScore::where([
    //         'class_id' => $request->class_id,
    //         'term_id' => $request->term_id,
    //         'exam_id' => $request->exam_id,
    //         'subject_id' => $request->subject_id,
    //         'year_id' => $request->year_id,
    //     ])->get();

    //     foreach ($records as $record) {
    //         if ($record->correct_answer === null) {
    //             continue;
    //         }

    //         // conver to percentage
    //         $percentage = ($record->correct_answer / $maxMarks) * 100;

    //         $grade = match (true) {
    //             $percentage >= 75 => 'A',
    //             $percentage >= 70 => 'B',
    //             $percentage >= 60 => 'C',
    //             $percentage >= 50 => 'D',
    //             $percentage >= 45 => 'E',
    //             default => 'F',
    //         };

    //         $record->update([
    //             'grade' => $grade,
    //         ]);
    //     }

    //     return response()->json([
    //         'message' => 'Grades calculated and saved successfully'
    //     ]);
    // }
}
