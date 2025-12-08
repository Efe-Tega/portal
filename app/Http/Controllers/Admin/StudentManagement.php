<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\EduClass;
use App\Models\LocalGovernment;
use App\Models\School;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;
use StudentRegistration;

class StudentManagement extends Controller
{
    public function getSchool($id)
    {
        $class = EduClass::find($id);

        return response()->json([
            'school_id' => $class?->school_id
        ]);
    }


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

        $registrationNumber = StudentRegistration::generateRegistrationNumber($request->school_id);

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
            'religion' => $request->religion,
            'dob' => $request->dob,
            'country_id' => $request->country,
            'state_id' => $request->state,
            'local_government_id' => $request->local_government,
            'admission_date' => $request->admission_date,
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

    public function studentProfile($id)
    {
        $studentInfo = User::findOrFail($id);
        return view('admin.students.student-profile', compact('studentInfo'));
    }

    public function editStudent($id)
    {
        $studentData = User::with('student')->findOrFail($id);
        $countries = Country::all();
        $classes = EduClass::all();
        $schools = School::all();
        $states = State::all();
        $lga = LocalGovernment::all();
        $nigeriaId = Country::where('name', 'Nigeria')->value('id');
        return view(
            'admin.students.edit-student',
            compact(
                'studentData',
                'countries',
                'classes',
                'schools',
                'states',
                'nigeriaId',
                'lga'
            )
        );
    }

    public function updateStudent(Request $request)
    {
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

        $id = $request->id;
        $student = User::findOrFail($id);
        $schoolId = $request->school_id;

        $oldSchool = $student->school_id;
        $oldClass = $student->class_id;

        if ($oldSchool != $schoolId || $oldClass != $request->class_id) {

            $registration_number = StudentRegistration::generateRegistrationNumber($schoolId);

            // Update User model table
            $student->update([
                'class_id' => $request->class_id,
                'school_id' => $schoolId,
                'registration_number' => $registration_number,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'status' => 'active',
                'graduated' => false,
                'password' => Hash::make($request->lastname),
            ]);
        } else {

            $student->update([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'status' => 'active',
                'graduated' => false,
                'password' => Hash::make($request->lastname),
            ]);
        }

        // Update Student table
        Student::where('user_id', $id)->update([
            'gender' => $request->gender,
            'religion' => $request->religion,
            'dob' => $request->dob,
            'country_id' => $request->country,
            'state_id' => $request->state,
            'local_government_id' => $request->local_government,
            'admission_date' => $request->admission_date,
            'phone' => $request->phone,
            'address' => $request->address,
            'guardian_name' => $request->guardian_name,
            'guardian_relationship' => $request->guardian_relationship,
            'guardian_phone' => $request->guardian_phone,
            'guardian_email' => $request->guardian_email,
        ]);


        return redirect()->back()->with('success', 'Student data updated successfully');
    }

    public function deleteStudent($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    // To be used on the CBT project and deleted
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
