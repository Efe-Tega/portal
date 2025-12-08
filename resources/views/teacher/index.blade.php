@extends('layouts.app')
@section('title', 'Teacher Dashboard')
@section('header', 'Dashboard Overview')
@section('teacher-content')
    <!-- Welcome Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome back, Mrs. Okonkwo! 👋</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Here's an overview of your classes and activities today.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Students</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">135</p>
                    <p class="text-sm text-primary-600 dark:text-primary-400 mt-1">Across 3 classes</p>
                </div>
                <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Classes Today</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">5</p>
                    <p class="text-sm text-green-600 dark:text-green-400 mt-1">2 completed</p>
                </div>
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pending Grades</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">23</p>
                    <p class="text-sm text-orange-600 dark:text-orange-400 mt-1">Need submission</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Assignments Due</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">8</p>
                    <p class="text-sm text-blue-600 dark:text-blue-400 mt-1">To be reviewed</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center"><svg
                        class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg></div>
            </div>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Today's Classes -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Today's Classes</h2>
                        <a href="timetable.html"
                            class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:text-primary-700">View
                            Timetable</a>
                    </div>
                </div>
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start space-x-4">
                            <div class="text-center min-w-[60px]">
                                <div class="text-sm font-semibold text-gray-900 dark:text-white">08:00</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">AM</div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">English Language</h3>
                                    <span
                                        class="text-xs font-semibold bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 px-2 py-1 rounded">Completed</span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">SS 2 Science A - Room 8</p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">45 Students</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start space-x-4">
                            <div class="text-center min-w-[60px]">
                                <div class="text-sm font-semibold text-gray-900 dark:text-white">09:45</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">AM</div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">English Language</h3>
                                    <span
                                        class="text-xs font-semibold bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 px-2 py-1 rounded">In
                                        Progress</span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">SS 2 Science B - Room 8</p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">42 Students</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start space-x-4">
                            <div class="text-center min-w-[60px]">
                                <div class="text-sm font-semibold text-gray-900 dark:text-white">11:30</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">AM</div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">English Language</h3>
                                    <span
                                        class="text-xs font-semibold bg-gray-100 dark:bg-gray-600 text-gray-600 dark:text-gray-300 px-2 py-1 rounded">Upcoming</span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">SS 3 Science - Room 8</p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">48 Students</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Recent Activities</h2>
                </div>
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Grades submitted for SS 2
                                    Science A</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Mid-term test scores uploaded
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">2 hours ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">New assignment created</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Essay writing - "The Role of
                                    Youth in Nation Building"</p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">5 hours ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-orange-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Attendance marked</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">SS 2 Science A - 43/45 present
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">Yesterday</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-gradient-to-br from-primary-500 to-purple-600 rounded-xl shadow-sm p-6 text-white">
                <h2 class="text-lg font-bold mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <a href="attendance.html"
                        class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                        <div class="font-semibold text-sm">Mark Attendance</div>
                        <div class="text-xs opacity-90 mt-1">Take class attendance</div>
                    </a>
                    <a href="grade-input.html"
                        class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                        <div class="font-semibold text-sm">Input Grades</div>
                        <div class="text-xs opacity-90 mt-1">Enter student scores</div>
                    </a>
                    <a href="assignments.html"
                        class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                        <div class="font-semibold text-sm">Create Assignment</div>
                        <div class="text-xs opacity-90 mt-1">Post new assignment</div>
                    </a>
                </div>
            </div>

            <!-- Class Performance -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">Class Performance</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">SS 2 Science A</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">78.5%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 78.5%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">SS 2 Science B</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">75.2%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 75.2%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">SS 3 Science</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">81.3%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-primary-500 h-2 rounded-full" style="width: 81.3%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
