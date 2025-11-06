@extends('admin.admin-main')
@section('admin-content')
    <!-- Welcome Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome to Excellence Academy Admin
            Portal! 👋</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Second Term, 2024/2025 Academic Session - Week 8</p>
    </div>

    <!-- Main Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Students</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">1,245</p>
                    <p class="text-sm text-green-600 dark:text-green-400 mt-1">↑ 5.2% from last term</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
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
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Teachers</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">78</p>
                    <p class="text-sm text-green-600 dark:text-green-400 mt-1">↑ 3 new hires</p>
                </div>
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Classes</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">42</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">JSS & SS Classes</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Attendance Rate</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">94.3%</p>
                    <p class="text-sm text-green-600 dark:text-green-400 mt-1">Excellent</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Info Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Class Distribution -->
        <div
            class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Student Distribution by Class</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">JSS 1 (5
                                classes)</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">215 students</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full" style="width: 17.3%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">JSS 2 (5
                                classes)</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">208 students</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div class="bg-green-500 h-3 rounded-full" style="width: 16.7%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">JSS 3 (5
                                classes)</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">198 students</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div class="bg-purple-500 h-3 rounded-full" style="width: 15.9%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">SS 1 (9
                                classes)</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">224 students</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div class="bg-yellow-500 h-3 rounded-full" style="width: 18%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">SS 2 (9
                                classes)</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">212 students</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div class="bg-pink-500 h-3 rounded-full" style="width: 17%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">SS 3 (9
                                classes)</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">188 students</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div class="bg-red-500 h-3 rounded-full" style="width: 15.1%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-gradient-to-br from-primary-500 to-purple-600 rounded-xl shadow-sm p-6 text-white">
            <h3 class="text-lg font-bold mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="students.html"
                    class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                    <div class="font-semibold text-sm">Add New Student</div>
                    <div class="text-xs opacity-90 mt-1">Register new student</div>
                </a>
                <a href="teachers.html"
                    class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                    <div class="font-semibold text-sm">Add New Teacher</div>
                    <div class="text-xs opacity-90 mt-1">Register new teacher</div>
                </a>
                <a href="classes.html"
                    class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                    <div class="font-semibold text-sm">Manage Classes</div>
                    <div class="text-xs opacity-90 mt-1">View & edit classes</div>
                </a>
                <a href="reports.html"
                    class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                    <div class="font-semibold text-sm">Generate Reports</div>
                    <div class="text-xs opacity-90 mt-1">Academic reports</div>
                </a>
                <a href="settings.html"
                    class="block bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg p-3 transition-colors">
                    <div class="font-semibold text-sm">System Settings</div>
                    <div class="text-xs opacity-90 mt-1">Configure system</div>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activities & Alerts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Activities -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Recent Activities</h3>
            </div>
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">New teacher registered
                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Mrs. Adebayo joined as
                                Mathematics teacher</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Results published</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">SS 3 Mid-term results are
                                now available</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">5 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-orange-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Class schedule updated
                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">JSS 2 timetable modified
                                for next week</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">Yesterday</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Alerts -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">System Alerts</h3>
            </div>
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                <div class="p-4 bg-yellow-50 dark:bg-yellow-900/20">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mt-0.5" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Fee Payment Deadline
                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Second term fees deadline
                                is in 5 days</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-red-50 dark:bg-red-900/20">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-red-600 dark:text-red-400 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Pending Results</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">12 teachers haven't
                                submitted results</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-blue-50 dark:bg-blue-900/20">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">WAEC Registration</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">SS 3 WAEC registration
                                opens next week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
