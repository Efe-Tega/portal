<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Teacher;
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

        // Teacher::create([
        //     'name' => 'Kareem Abosede',
        //     'email' => 'kareem@gmail.com',
        //     'password' => Hash::make('123456'),
        // ]);

        Teacher::factory()->count(10)->create();

        // School::insert([
        //     [
        //         'name' => 'Basic Science',
        //         'code' => 'BS'
        //     ],
        //     [
        //         'name' => 'Junior School',
        //         'code' => 'JS'
        //     ],
        //     [
        //         'name' => 'Secondary School',
        //         'code' => 'SS'
        //     ]
        // ]);
    }
}
