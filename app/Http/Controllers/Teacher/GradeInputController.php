<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\EduClass;
use App\Models\Exam;
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

        $spreadsheet = IOFactory::load($request->file('excelFile')->getPathname());
        $sheet = $spreadsheet->getActiveSheet();

        // Read Excel metadata
        $excelTerm = trim($sheet->getCell('G4')->getValue());
        $excelYear = trim($sheet->getCell('H4')->getValue());
        $excelAssessment = trim($sheet->getCell('I4')->getValue());
        $excelSubject = trim($sheet->getCell('F4')->getValue());


        $selectedTerm = Term::find($request->term_id)?->name;
        $selectedYear = AcademicYear::find($request->year_id)?->name;
        $selectedExam = Exam::find($request->exam_id)?->name;
        $selectedSubject = Subject::find($request->subject_id)?->name;

        // dd($excelTerm . '=' . $selectedTerm, $excelYear . '=' . $selectedYear, $excelAssessment . '=' . $selectedExam, $excelSubject . '=' . $selectedSubject);

        if (
            strcasecmp($excelTerm, $selectedTerm) !== 0 ||
            strcasecmp($excelYear, $selectedYear) !== 0 ||
            strcasecmp($excelAssessment, $selectedExam) !== 0 ||
            strcasecmp($excelSubject, $selectedSubject) !== 0
        ) {
            return back()->with(
                'error',
                "Import failed: Excel file does not match selected filters.
                Please ensure Term, Year, Assessment and Subject are the same with excel data."
            );
        }

        $rows = $sheet->toArray();
        $rows = array_slice($rows, 3);

        foreach ($rows as $index => $row) {
            // ✅ skip completely empty rows
            if (empty(array_filter($row))) {
                continue;
            }

            $excelRow = $index + 4;

            // Column mapping
            $registrationNo = trim($row[4] ?? null);
            $score = isset($row[9]) && $row[9] !== '' ? (int) $row[9] : 0;
            $total = isset($row[10]) ? (int) $row[10] : null;

            if (!$registrationNo) {
                return back()->with('error', "Import failed: Missing registration number at row {$excelRow}");
            }

            // Optional: enforce score range (CA1 max 10)
            // if ($score < 0 || $score > 10) {
            //     $errors[] = [
            //         'row' => $excelRow,
            //         'registration' => $registrationNo,
            //         'reason' => 'Score out of allowed range',
            //     ];
            //     continue;
            // }

            $student = User::where('registration_number', $registrationNo)->first();
            if (!$student) {
                return back()->with(
                    'error',
                    "Import failed: Student with registration number {$registrationNo} not found (row {$excelRow})"
                );
            }

            if ((int) $student->class_id !== (int) $request->class_id) {
                return back()->with(
                    'error',
                    "Import failed: Student {$registrationNo} does not belong to the selected class (row {$excelRow})"
                );
            }

            StudentRecordScore::updateOrCreate(
                [
                    'user_id' => $student->id,
                    'class_id' => $request->class_id,
                    'term_id' => $request->term_id,
                    'exam_id' => $request->exam_id,
                    'subject_id' => $request->subject_id,
                    'year_id' => $request->year_id,
                ],
                [
                    'correct_answer' => $score,
                    'total_questions' => $total,
                ]
            );
        }
        return back()->with('success', "Scores Imported successfully");
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
                'name' => $student->lastname . '' . $student->firstname,
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
