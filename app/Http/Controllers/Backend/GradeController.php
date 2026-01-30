<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EduClass;
use App\Models\SchoolInfo;
use App\Models\StudentRecordScore;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function grades(Request $request)
    {
        $user = Auth::user();
        $schoolData = SchoolInfo::find(1);

        $records = StudentRecordScore::with(['exam', 'subject.teacher'])
            ->where('user_id', $user->id)
            ->where('class_id', $user->class_id)
            ->where('term_id', $schoolData->previous_term_id)
            ->where('year_id', $schoolData->previous_year_id)
            ->get()
            ->groupBy('subject_id');

        $classStudents = StudentRecordScore::where('class_id', $user->class_id)
            ->where('term_id', $schoolData->previous_term_id)
            ->where('year_id', $schoolData->previous_year_id)
            ->get()
            ->groupBy('user_id');

        $gradeDistribution = [
            'distinction' => 0,
            'credit' => 0,
            'pass' => 0,
            'fail' => 0,
        ];

        $averages = [];

        foreach ($classStudents as $userId => $studentResults) {
            $grouped = $studentResults->groupBy('subject_id');

            $sum = 0;
            $count = 0;

            foreach ($grouped as $subjectResults) {
                $ca = $subjectResults->firstWhere('exam_id', 1);
                $exam = $subjectResults->firstWhere('exam_id', 2);

                $sum += ($ca->correct_answer ?? 0) + ($exam->correct_answer ?? 0);
                $count++;
            }

            $averages[$userId] = $count > 0 ? $sum / $count : 0;
        }

        // sort descending
        arsort($averages);

        $classPosition = array_search($user->id, array_keys($averages)) + 1;
        $totalStudents = count($averages);
        $topPercent = round(($classPosition / $totalStudents) * 100);

        foreach ($records as $subjectRecords) {
            $ca = $subjectRecords->firstWhere('exam_id', 1);
            $exam = $subjectRecords->firstWhere('exam_id', 2);

            $total = ($ca->correct_answer ?? 0) + ($exam->correct_answer ?? 0);

            if ($total >= 75) {
                $gradeDistribution['distinction']++;
            } elseif ($total >= 60) {
                $gradeDistribution['credit']++;
            } elseif ($total >= 40) {
                $gradeDistribution['pass']++;
            } else {
                $gradeDistribution['fail']++;
            }
        }

        $totalSubjects = count($records);

        // Term Averages
        $previousTermAverage = $this->calculateTermAverage(
            $user->id,
            $user->class_id,
            $schoolData->previous_term_id,
            $schoolData->previous_year_id
        );

        $currentTermAverage = $this->calculateTermAverage(
            $user->id,
            $user->class_id,
            $schoolData->current_term_id,
            $schoolData->current_year_id
        );

        $averageChange = round($currentTermAverage - $previousTermAverage, 1);

        // Term Progress
        $termStart = Carbon::parse($schoolData->start_date);
        $termEnd = Carbon::parse($schoolData->end_date);
        $today = Carbon::today();

        $totalDays = $termStart->diffInDays($termEnd);
        $passedDays = $termStart->diffInDays(min($today, $termEnd));

        $progressPercent = min(
            round(($passedDays / $totalDays) * 100),
            100
        );

        $totalWeeks = ceil($totalDays / 7);
        $weeksPassed = ceil($passedDays / 7);
        $weeksLeft = max($totalWeeks - $weeksPassed, 0);


        return view('user.grades', compact(
            'records',
            'gradeDistribution',
            'totalSubjects',
            'previousTermAverage',
            'currentTermAverage',
            'averageChange',
            'classPosition',
            'totalStudents',
            'topPercent',
            'progressPercent',
            'weeksPassed',
            'weeksLeft',
        ));
    }

    private function calculateTermAverage(
        $studentId,
        $classId,
        $termId,
        $yearId,
    ) {
        $records = StudentRecordScore::where('user_id', $studentId)
            ->where('user_id', $studentId)
            ->where('class_id', $classId)
            ->where('term_id', $termId)
            ->where('year_id', $yearId)
            ->get()
            ->groupBy('subject_id');

        $totalScore = 0;
        $subjectCount = 0;

        foreach ($records as $subjectRecords) {
            $ca = $subjectRecords->firstWhere('exam_id', 1);
            $exam = $subjectRecords->firstWhere('exam_id', 2);

            $totalScore += ($ca->correct_answer ?? 0) + ($exam->correct_answer ?? 0);

            $subjectCount++;
        }

        return $subjectCount > 0 ? round($totalScore / $subjectCount, 1) : 0;
    }
}
