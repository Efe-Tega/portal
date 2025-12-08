@extends('layouts.app')
@section('header', 'Student Profile')
@section('admin-content')
    <!-- Breadcrumb -->
    <div class="mb-6">
        <nav class="flex text-sm text-gray-500 dark:text-gray-400">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600">Dashboard</a>
            <span class="mx-2">/</span>
            <span>Students</span>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.students.all_students') }}" class="hover:text-primary-600">All Students</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 dark:text-white">Profile</span>
        </nav>
    </div>

    @php
        $age = \Carbon\Carbon::parse($studentInfo->student->dob ?? '')->age;
        $fullname = $studentInfo->lastname . ' ' . $studentInfo->middlename . ' ' . $studentInfo->firstname;
        $initials = collect(explode(' ', $fullname))->map(fn($p) => strtoupper($p[0]))->join('');
    @endphp


    <!-- Profile Header -->
    <div class="bg-gradient-to-r from-primary-600 to-purple-600 rounded-xl shadow-sm p-8 mb-6">
        <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-6">
            <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center shadow-lg">
                <span class="text-primary-600 font-bold text-4xl">{{ $initials }}</span>
            </div>
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-3xl font-bold text-white mb-2">{{ $fullname }}</h2>
                <p class="text-primary-100 mb-4">{{ $studentInfo->class->name }} • Student ID:
                    {{ $studentInfo->registration_number }}</p>
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-3">
                    <span class="px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-lg text-sm font-medium">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Student {{ ucfirst($studentInfo->status) }}
                    </span>
                    <span class="px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-lg text-sm font-medium">
                        Admitted: {{ formatDate($studentInfo->student->admission_date ?? '') }}
                    </span>
                    <span class="px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-lg text-sm font-medium">
                        Age: {{ $age }} years
                    </span>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('admin.edit.student', [$studentInfo->id, $studentInfo->lastname . '_' . $studentInfo->firstname]) }}"
                    class="px-6 py-3 bg-white text-primary-600 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit Profile
                </a>
                <button
                    class="px-6 py-3 bg-white/20 backdrop-blur-sm text-white rounded-lg font-medium hover:bg-white/30 transition-colors">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Print
                </button>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="mb-6">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="flex space-x-8">
                <button
                    class="tab-button active py-4 px-1 border-b-2 border-primary-600 text-primary-600 dark:text-primary-400 font-medium text-sm"
                    data-tab="overview">
                    Overview
                </button>
                <button
                    class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 font-medium text-sm"
                    data-tab="academic">
                    Academic Records
                </button>
                <button
                    class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 font-medium text-sm"
                    data-tab="attendance">
                    Attendance
                </button>
                <button
                    class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 font-medium text-sm"
                    data-tab="financial">
                    Financial
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div id="tabContent">
        <!-- Overview Tab -->
        <div class="tab-content active" data-tab="overview">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Personal Information -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Personal Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Full Name</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">{{ $fullname }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Date of Birth</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ formatDate($studentInfo->student->dob ?? '', 'F j, Y') }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Gender</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->gender ?? '' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Blood Group</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">O+</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">State of Origin</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->state->name ?? '' }} State</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">LGA</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->lga->name ?? '' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Religion</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ ucfirst($studentInfo->student->religion ?? '') }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Nationality</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->country->name ?? '' }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Residential
                                    Address</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->address ?? '' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guardian Information -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Guardian Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Guardian Name</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->guardian_name ?? '' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Relationship</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->guardian_relationship ?? '' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Phone Number</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->guardian_phone ?? '' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Email Address</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->guardian_email ?? '' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Occupation</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">Engineer</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Office Address</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">Victoria Island, Lagos</p>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            Academic Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Current Class</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">{{ $studentInfo->class->name }}
                                </p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Admission
                                    Number</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium font-mono">
                                    {{ $studentInfo->registration_number }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Admission Date</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ formatDate($studentInfo->student->admission_date ?? '') }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Previous School</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">
                                    {{ $studentInfo->student->previous_school ?? '' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">House</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">Red House</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-400">Class Teacher</label>
                                <p class="mt-1 text-gray-900 dark:text-white font-medium">Mrs. Adeyemi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Quick Stats -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Quick Stats</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Overall Average</p>
                                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">78.5%</p>
                                </div>
                                <div
                                    class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Attendance Rate</p>
                                    <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">94%</p>
                                </div>
                                <div
                                    class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div
                                class="flex items-center justify-between p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Class Rank</p>
                                    <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">12/45</p>
                                </div>
                                <div
                                    class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                            </div>

                            <div
                                class="flex items-center justify-between p-4 bg-orange-50 dark:bg-orange-900/20 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Subjects</p>
                                    <p class="text-2xl font-bold text-orange-600 dark:text-orange-400">9</p>
                                </div>
                                <div
                                    class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Recent Activity</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm text-gray-900 dark:text-white font-medium">Submitted Chemistry
                                        Assignment</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">2 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm text-gray-900 dark:text-white font-medium">Attended Physics Class</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">5 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm text-gray-900 dark:text-white font-medium">Scored 85% in Biology Test
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">1 day ago</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm text-gray-900 dark:text-white font-medium">Fee Payment Received</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">3 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Actions -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Quick Actions</h3>
                        <div class="space-y-3">
                            <button
                                class="w-full flex items-center justify-center px-4 py-3 bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 rounded-lg hover:bg-primary-100 dark:hover:bg-primary-900/30 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Send Email
                            </button>
                            <button
                                class="w-full flex items-center justify-center px-4 py-3 bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                Call Guardian
                            </button>
                            <button
                                class="w-full flex items-center justify-center px-4 py-3 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Generate Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Records Tab -->
        <div class="tab-content hidden" data-tab="academic">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Current Term Results</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                    Subject</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                    CA (40)</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                    Exam (60)</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                    Total (100)</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                    Grade</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                    Position</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Mathematics</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">32</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">48</td>
                                <td class="px-6 py-4 text-sm text-center font-semibold text-gray-900 dark:text-white">80
                                </td>
                                <td class="px-6 py-4 text-center"><span
                                        class="px-3 py-1 text-xs font-medium text-green-700 dark:text-green-400 bg-green-100 dark:bg-green-900/30 rounded-full">A</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">8/45</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">English Language
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">30</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">45</td>
                                <td class="px-6 py-4 text-sm text-center font-semibold text-gray-900 dark:text-white">75
                                </td>
                                <td class="px-6 py-4 text-center"><span
                                        class="px-3 py-1 text-xs font-medium text-green-700 dark:text-green-400 bg-green-100 dark:bg-green-900/30 rounded-full">B</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">15/45</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Physics</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">35</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">50</td>
                                <td class="px-6 py-4 text-sm text-center font-semibold text-gray-900 dark:text-white">85
                                </td>
                                <td class="px-6 py-4 text-center"><span
                                        class="px-3 py-1 text-xs font-medium text-green-700 dark:text-green-400 bg-green-100 dark:bg-green-900/30 rounded-full">A</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">5/45</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Chemistry</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">28</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">42</td>
                                <td class="px-6 py-4 text-sm text-center font-semibold text-gray-900 dark:text-white">70
                                </td>
                                <td class="px-6 py-4 text-center"><span
                                        class="px-3 py-1 text-xs font-medium text-blue-700 dark:text-blue-400 bg-blue-100 dark:bg-blue-900/30 rounded-full">B</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">20/45</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Biology</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">33</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">45</td>
                                <td class="px-6 py-4 text-sm text-center font-semibold text-gray-900 dark:text-white">78
                                </td>
                                <td class="px-6 py-4 text-center"><span
                                        class="px-3 py-1 text-xs font-medium text-green-700 dark:text-green-400 bg-green-100 dark:bg-green-900/30 rounded-full">B</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-600 dark:text-gray-400">12/45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Attendance Tab -->
        <div class="tab-content hidden" data-tab="attendance">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Attendance Summary</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Present</p>
                        <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">142 days</p>
                    </div>
                    <div class="p-4 bg-red-50 dark:bg-red-900/20 rounded-lg">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Absent</p>
                        <p class="text-3xl font-bold text-red-600 dark:text-red-400 mt-2">9 days</p>
                    </div>
                    <div class="p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Attendance Rate</p>
                        <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400 mt-2">94%</p>
                    </div>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Detailed attendance records and calendar view would be
                    displayed here.</p>
            </div>
        </div>

        <!-- Financial Tab -->
        <div class="tab-content hidden" data-tab="financial">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Fee Payment Status</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Fees</p>
                        <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mt-2">₦250,000</p>
                    </div>
                    <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Amount Paid</p>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400 mt-2">₦250,000</p>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Balance</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">₦0</p>
                    </div>
                </div>
                <div class="flex items-center justify-center p-6 bg-green-50 dark:bg-green-900/20 rounded-lg">
                    <svg class="w-12 h-12 text-green-600 dark:text-green-400 mr-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="text-lg font-bold text-green-600 dark:text-green-400">Fees Fully Paid</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Last payment: January 15, 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab Switching
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabName = button.getAttribute('data-tab');

                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => {
                    btn.classList.remove('active', 'border-primary-600', 'text-primary-600',
                        'dark:text-primary-400');
                    btn.classList.add('border-transparent', 'text-gray-500', 'dark:text-gray-400');
                });

                tabContents.forEach(content => {
                    content.classList.remove('active');
                    content.classList.add('hidden');
                });

                // Add active class to clicked button and corresponding content
                button.classList.add('active', 'border-primary-600', 'text-primary-600',
                    'dark:text-primary-400');
                button.classList.remove('border-transparent', 'text-gray-500', 'dark:text-gray-400');

                const activeContent = document.querySelector(`.tab-content[data-tab="${tabName}"]`);
                activeContent.classList.remove('hidden');
                activeContent.classList.add('active');
            });
        });
    </script>
@endsection
