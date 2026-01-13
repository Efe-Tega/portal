<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\AffectiveTrait;
use App\Models\EduClass;
use App\Models\SportParticipation;
use App\Models\TeacherClass;
use App\Models\Term;
use App\Models\TraitScore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffectiveTraitManagement extends Controller
{
    public function byClass($classId)
    {
        return User::where('class_id', $classId)
            ->get()
            ->map(fn($s) => [
                'id' => $s->id,
                'name' => fullname($s->lastname, $s->middlename, $s->firstname)
            ]);
    }

    public function index(Request $request)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $classIds = TeacherClass::where('teacher_id', $teacherId)->pluck('class_id');
        $classes = EduClass::whereIn('id', $classIds)->get();
        $terms = Term::all();
        $years = AcademicYear::all();

        return view('teacher.affective-trait', compact('classes',  'terms', 'years'));
    }

    public function studentTraits($studentId, Request $request)
    {
        $traits = AffectiveTrait::all();

        $scores = TraitScore::where('user_id', $studentId)
            ->where('term_id', $request->term_id)
            ->where('academic_year_id', $request->year_id)
            ->get()
            ->keyBy('trait_id');

        $student = User::findOrFail($studentId);

        return view('teacher.partial.trait-table', compact('traits', 'scores', 'studentId', 'student'));
    }

    public function saveTraitScore(Request $request)
    {
        TraitScore::updateOrCreate([
            'user_id' => $request->student_id,
            'trait_id' => $request->trait_id,
            'term_id' => $request->term_id,
            'academic_year_id' => $request->academic_year_id,
        ], [
            'score' => $request->score
        ]);

        return response()->json(['status' => 'saved']);
    }

    public function saveSportParticipation(Request $request)
    {
        SportParticipation::updateOrCreate([
            'user_id' => $request->student_id,
            'sport' => $request->sport,
            'term_id' => $request->term_id,
            'academic_year_id' => $request->academic_year_id,
        ], [
            'active' => $request->active
        ]);

        return response()->json(['success' => true]);
    }

    public function getSports(Request $request, $studentId)
    {
        $sports = SportParticipation::where('user_id', $studentId)
            ->where('term_id', $request->term_id)
            ->where('academic_year_id', $request->academic_year_id)
            ->pluck('active', 'sport');

        return response()->json($sports);
    }
}
