<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Admin;
use App\Models\Term;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Admin::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('111'),
        // ]);

        AcademicYear::create([
            'name' => '2024/2025',
            'created_at' => Carbon::now()
        ]);
    }
}
