<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EduClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StudentManagement extends Controller
{
    public function allStudents(Request $request)
    {
        $classes = EduClass::all();
        $query = User::with('class');


        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('firstname', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%")
                    ->orWhere('registration_number', 'like', "%{$search}%");
            });
        }

        if ($filter = $request->filled('class_id')) {
            $query->where('class_id', $request->class_id);
        }

        $totalStudents = User::all()->count();
        $activeStudents = User::where('status', 'active')->count();
        $students = $query->paginate(10)->withQueryString();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.students.partials.table-rows', compact('students'))->render(),
            ]);
        }

        return view('admin.students.index', [
            'students' => $students,
            'classes' => $classes,
            'selectedClassId' => $request->class_id,
            'totalStudents' => $totalStudents,
            'activeStudents' => $activeStudents,
        ]);
    }

    public function importStudents(Request $request)
    {
        try {
            $file = $request->file('file');

            if (!$file) {
                return back()->with('error', 'No file uploaded.');
            }

            // Load spreadsheet
            $spreadsheet = IOFactory::load($file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true);

            $imported = 0;
            $skipped = 0;
            $rowCount = count($rows);

            if ($rowCount <= 3) {
                return back()->with('error', 'No valid student records found in the file.');
            }

            foreach ($rows as $index => $row) {
                // Skip headers and empty rows
                if ($index <= 3 || empty($row['B'])) continue;

                $surname = trim($row['C'] ?? '');
                $firstName = trim($row['D'] ?? '');
                $middleName = trim($row['E'] ?? '');
                $regNumber = trim($row['B'] ?? '');
                $classId = isset($row['F']) ? (int) trim($row['F']) : null;

                if (!$surname || !$firstName) continue;

                $exists = User::whereRaw('LOWER(lastname) = ?', [strtolower($surname)])
                    ->whereRaw('LOWER(firstname) = ?', [strtolower($firstName)])
                    ->whereRaw('LOWER(middlename) = ?', [strtolower($middleName)])
                    ->exists();

                if ($exists) {
                    $skipped++;
                    continue;
                }

                User::create([
                    'registration_number' => $regNumber,
                    'lastname' => $surname,
                    'firstname' => $firstName,
                    'middlename' => $middleName,
                    'class_id' => $classId,
                    'password' => Hash::make($surname),
                ]);

                $imported++;
            }

            return back()->with('success', "{$imported} students imported, {$skipped} skipped.");
        } catch (\Throwable $e) {
            // Show the actual error for debugging
            dd('Error:', $e->getMessage(), $e->getLine(), $e->getFile());
        }
    }
}
