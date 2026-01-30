@extends('user.user-main')

@section('main-content')
    <!-- Welcome Section -->
    <x-page-header>
        <x-slot:title>Welcome back, Adewale! 👋</x-slot:title>
        <x-slot:subtitle>Here's what's happening with your studies today.</x-slot:subtitle>
    </x-page-header>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Term Average</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">78.5%</p>
                    <p class="text-sm text-green-600 dark:text-green-400 mt-1">↑ 5% from last term</p>
                </div>
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Active Subjects</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">9</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Second Term</p>
                </div>
                <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
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
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pending Tasks</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">7</p>
                    <p class="text-sm text-orange-600 dark:text-orange-400 mt-1">3 due this week</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Attendance</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">94%</p>
                    <p class="text-sm text-green-600 dark:text-green-400 mt-1">Excellent record</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Upcoming Assignments -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Upcoming Assignments
                        </h2>
                        <a href="assignments.html"
                            class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:text-primary-700">View
                            all</a>
                    </div>
                </div>
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-red-600 dark:text-red-400 font-semibold text-sm">MA</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Further Mathematics
                                    Assignment</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Differentiation and
                                    Integration exercises</p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span
                                        class="text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/30 px-2 py-1 rounded">Due
                                        Tomorrow</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">65%
                                        completed</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-blue-600 dark:text-blue-400 font-semibold text-sm">PH</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Physics Practical
                                    Report</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Simple Harmonic
                                    Motion
                                    experiment</p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span
                                        class="text-xs font-medium text-orange-600 dark:text-orange-400 bg-orange-50 dark:bg-orange-900/30 px-2 py-1 rounded">Due
                                        in 3 days</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">Not
                                        started</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-green-600 dark:text-green-400 font-semibold text-sm">EN</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 dark:text-white">English Language
                                    Essay
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Argumentative essay
                                    -
                                    500 words</p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span
                                        class="text-xs font-medium text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/30 px-2 py-1 rounded">Due
                                        in 1 week</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">Draft in
                                        progress</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Results -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Recent Results</h2>
                        <a href="grades.html"
                            class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:text-primary-700">View
                            all</a>
                    </div>
                </div>
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-purple-600 dark:text-purple-400 font-semibold text-sm">CH</span>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Chemistry Test
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Organic Chemistry
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-green-600 dark:text-green-400">85%
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Distinction</div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-yellow-600 dark:text-yellow-400 font-semibold text-sm">BI</span>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Biology Quiz
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Genetics & Heredity
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-green-600 dark:text-green-400">78%
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Credit</div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-red-600 dark:text-red-400 font-semibold text-sm">MA</span>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Mathematics CAT
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Continuous
                                        Assessment
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">72%</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Credit</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Today's Timetable -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-bold text-gray-900 dark:text-white">Today's Classes</h2>
                        <a href="schedule.html"
                            class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:text-primary-700">View
                            all</a>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="text-center flex-shrink-0">
                            <div class="text-xs font-medium text-gray-500 dark:text-gray-400">08:00</div>
                            <div class="text-xs text-gray-400 dark:text-gray-500">AM</div>
                        </div>
                        <div class="flex-1 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 rounded-r-lg p-3">
                            <div class="font-semibold text-gray-900 dark:text-white text-sm">Mathematics
                            </div>
                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Room 12 - Mr.
                                Adeyemi
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="text-center flex-shrink-0">
                            <div class="text-xs font-medium text-gray-500 dark:text-gray-400">09:30</div>
                            <div class="text-xs text-gray-400 dark:text-gray-500">AM</div>
                        </div>
                        <div class="flex-1 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 rounded-r-lg p-3">
                            <div class="font-semibold text-gray-900 dark:text-white text-sm">English
                                Language
                            </div>
                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Room 8 - Mrs.
                                Okonkwo
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="text-center flex-shrink-0">
                            <div class="text-xs font-medium text-gray-500 dark:text-gray-400">11:00</div>
                            <div class="text-xs text-gray-400 dark:text-gray-500">AM</div>
                        </div>
                        <div class="flex-1 bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 rounded-r-lg p-3">
                            <div class="font-semibold text-gray-900 dark:text-white text-sm">Physics</div>
                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Lab 2 - Mr. Okoro
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="text-center flex-shrink-0">
                            <div class="text-xs font-medium text-gray-500 dark:text-gray-400">12:30</div>
                            <div class="text-xs text-gray-400 dark:text-gray-500">PM</div>
                        </div>
                        <div
                            class="flex-1 bg-gray-100 dark:bg-gray-700 border-l-4 border-gray-400 dark:border-gray-500 rounded-r-lg p-3">
                            <div class="font-semibold text-gray-900 dark:text-white text-sm">Break</div>
                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Cafeteria</div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="text-center flex-shrink-0">
                            <div class="text-xs font-medium text-gray-500 dark:text-gray-400">02:00</div>
                            <div class="text-xs text-gray-400 dark:text-gray-500">PM</div>
                        </div>
                        <div
                            class="flex-1 bg-purple-50 dark:bg-purple-900/20 border-l-4 border-purple-500 rounded-r-lg p-3">
                            <div class="font-semibold text-gray-900 dark:text-white text-sm">Chemistry
                            </div>
                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Lab 1 - Dr. Bello
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gradient-to-br from-primary-500 to-purple-600 rounded-xl shadow-sm p-6 text-white">
                <h2 class="text-lg font-bold mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <a href="assignments.html"
                        class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                        <div class="font-semibold text-sm">Submit Assignment</div>
                        <div class="text-xs opacity-90 mt-1">Upload your completed work</div>
                    </a>
                    <a href="schedule.html"
                        class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                        <div class="font-semibold text-sm">View Timetable</div>
                        <div class="text-xs opacity-90 mt-1">Check your weekly schedule</div>
                    </a>
                    <a href="grades.html"
                        class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                        <div class="font-semibold text-sm">Check Results</div>
                        <div class="text-xs opacity-90 mt-1">View all your grades</div>
                    </a>
                </div>
            </div>

            <!-- Announcements -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">Announcements</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="border-l-4 border-primary-500 pl-4">
                        <div class="flex items-center space-x-2 mb-1">
                            <span class="text-xs font-semibold text-primary-600 dark:text-primary-400">IMPORTANT</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">2 hours ago</span>
                        </div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">WAEC Mock Exams
                            Schedule
                        </p>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Check notice board for
                            exam
                            timetable.</p>
                    </div>

                    <div class="border-l-4 border-green-500 pl-4">
                        <div class="flex items-center space-x-2 mb-1">
                            <span class="text-xs font-semibold text-green-600 dark:text-green-400">EVENT</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">1 day ago</span>
                        </div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Inter-House Sports</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Registrations close this
                            Friday.</p>
                    </div>

                    <div class="border-l-4 border-blue-500 pl-4">
                        <div class="flex items-center space-x-2 mb-1">
                            <span class="text-xs font-semibold text-blue-600 dark:text-blue-400">INFO</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">3 days ago</span>
                        </div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">PTA Meeting</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Next Saturday at 10:00 AM
                            in
                            the hall.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
