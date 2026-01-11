<?php

namespace App\Jobs;

use App\Models\AcademicYear;
use App\Models\Exam;
use App\Models\ImportProgress;
use App\Models\StudentRecordScore;
use App\Models\Subject;
use App\Models\Term;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportScoresJob implements ShouldQueue
{
    use Queueable;

    protected string $path;
    protected array $data;
    protected ImportProgress $progress;

    /**
     * Create a new job instance.
     */
    public function __construct($path, $data, $progress)
    {
        $this->path = $path;
        $this->data = $data;
        $this->progress = $progress;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $this->progress->update(['status' => 'processing']);

            $absolutePath = Storage::path($this->path);

            if (!file_exists($absolutePath)) {
                throw new \Exception("Excel file not found at: {$absolutePath}");
            }

            $spreadsheet = IOFactory::load($absolutePath);
            $sheet = $spreadsheet->getActiveSheet();

            $excelTerm = trim($sheet->getCell('G4')->getValue());
            $excelYear = trim($sheet->getCell('H4')->getValue());
            $excelAssessment = trim($sheet->getCell('I4')->getValue());
            $excelSubject = trim($sheet->getCell('F4')->getValue());

            $selectedTerm = Term::find($this->data['term_id'])?->name;
            $selectedYear = AcademicYear::find($this->data['year_id'])?->name;
            $selectedExam = Exam::find($this->data['exam_id'])?->name;
            $selectedSubject = Subject::find($this->data['subject_id'])?->name;

            if (
                strcasecmp($excelTerm, $selectedTerm) !== 0 ||
                strcasecmp($excelYear, $selectedYear) !== 0 ||
                strcasecmp($excelAssessment, $selectedExam) !== 0 ||
                strcasecmp($excelSubject, $selectedSubject) !== 0
            ) {
                throw new \Exception(
                    'Excel metadata does not match selected filters.'
                );
            }

            $rows = array_slice($sheet->toArray(), 3);
            $this->progress->update(['total_rows' => count($rows)]);

            foreach ($rows as $index => $row) {
                if (empty(array_filter($row))) {
                    $this->progress->increment('processed_rows');
                    continue;
                }

                $excelRow = $index + 4;
                $registrationNo = trim($row[4] ?? null);
                $score = isset($row[9]) && $row[9] !== '' ? (int) $row[9] : 0;
                $total = isset($row[10]) ? (int) $row[10] : null;

                if (!$registrationNo) {
                    throw new \Exception("Missing registration number at row {$excelRow}");
                }

                $student = User::where('registration_number', $registrationNo)->first();
                if (!$student) {
                    throw new \Exception(
                        "Student {$registrationNo} not found (row {$excelRow})"
                    );
                }

                if ((int) $student->class_id !== (int) $this->data['class_id']) {
                    throw new \Exception(
                        "Student {$registrationNo} not in selected class (row {$excelRow})"
                    );
                }

                StudentRecordScore::updateOrCreate([
                    'user_id' => $student->id,
                    'class_id' => $this->data['class_id'],
                    'term_id' => $this->data['term_id'],
                    'exam_id' => $this->data['exam_id'],
                    'subject_id' => $this->data['subject_id'],
                    'year_id' => $this->data['year_id'],
                ], [
                    'correct_answer' => $score,
                    'total_questions' => $total,
                ]);

                $this->progress->increment('processed_rows');
                Storage::delete($this->path);
            }
            $this->progress->update(['status' => 'done']);
        } catch (\Throwable $e) {
            $this->progress->update([
                'status' => 'failed',
                'error' => $e->getMessage()
            ]);
        }
    }
}
