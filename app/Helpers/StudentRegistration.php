<?php

use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StudentRegistration
{
    public static function generateRegistrationNumber($school_id)
    {
        return DB::transaction(function () use ($school_id) {
            $year = date('y');

            // fetch school code
            $schoolCode = strtoupper(
                School::where('id', $school_id)->value('code')
            );

            // Fetch last reg number for this school + year
            $lastReg = User::where('school_id', $school_id)
                ->where('registration_number', 'like', "NRS/$year/$schoolCode/%")
                ->orderBy('id', 'desc')
                ->lockForUpdate()
                ->value('registration_number');

            if ($lastReg) {
                $lastNumber = (int) substr($lastReg, strrpos($lastReg, '/') + 1);
                $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '0001';
            }

            return "NRS/$year/$schoolCode/$newNumber";
        });
    }
}
