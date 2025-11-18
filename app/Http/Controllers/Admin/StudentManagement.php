<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\EduClass;
use App\Models\LocalGovernment;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
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

    public function addNewStudent()
    {
        $classes = EduClass::all();
        $schools = School::all();
        $countries = Country::all();
        $nigeriaId = Country::where('name', 'Nigeria')->value('id');

        return view('admin.students.add-student', [
            'classes' => $classes,
            'schools' => $schools,
            'countries' => $countries,
            'nigeriaId' => $nigeriaId,
        ]);
    }

    public function registerNewStudent(Request $request)
    {
        dd($request->admission_date);

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'state' => 'required',

            'class_id' => 'required',
            'admission_date' => 'required',
            'school_id' => 'required',

            'guardian_name' => 'required',
            'guardian_relationship' => 'required',
            'guardian_phone' => 'required',
            'address' => 'required',
        ], [
            'firstname.required' => 'Please enter student firstname',
            'lastname.required' => 'Please enter student surname',
            'dob.required' => 'Date of Birth cannot be left empty',
            'country.required' => 'Please select a country',
            'state.required' => 'Please select a state',
            'class_id.required' => 'Student class is required',
            'admission_date.required' => 'Please enter admission date',
            'school_id.required' => 'Educational level is required',
            'guardian_name.required' => 'This field is required',
            'guardian_relationship.required' => 'This field is required',
            'guardian_phone.required' => 'Please enter phone number',
            'address.required' => 'Please enter address',
        ]);


        $year = date('y');


        // Fetch school code
        $schoolCode = strtoupper(School::where('id', $request->school_id)->value('code'));

        // Get last registration number for this school & year
        $lastReg = User::where('school_id', $request->school_id)
            ->where('registration_number', 'like', "NRS/$year/$schoolCode/%")
            ->orderBy('id', 'desc')
            ->value('registration_number');

        if ($lastReg) {
            $lastNumber = (int) substr($lastReg, strrpos($lastReg, '/') + 1);
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

        $registrationNumber = "NRS/$year/$schoolCode/$newNumber";

        // Create the new student
        $userId = User::insertGetId([
            'class_id' => $request->class_id,
            'school_id' => $request->school_id,
            'registration_number' => $registrationNumber,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'status' => 'active',
            'graduated' => false,
            'password' => Hash::make($request->lastname),
            'created_at' => Carbon::now(),
        ]);

        Student::insert([
            'user_id' => $userId,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'country' => $request->country,
            'state' => $request->state,
            'local_government' => $request->local_government,
            'phone' => $request->phone,
            'address' => $request->address,
            'guardian_name' => $request->guardian_name,
            'guardian_relationship' => $request->guardian_relationship,
            'guardian_phone' => $request->guardian_phone,
            'guardian_email' => $request->guardian_email,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Student created successfully');
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
