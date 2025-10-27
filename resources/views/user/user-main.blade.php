<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Home</title>

    @vite('resources/css/app.css')

</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0">
        <div class="h-full bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-primary-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold">SP</span>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 dark:text-white">Student Portal</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">SS 2 Science</div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 overflow-y-auto">
                <ul class="space-y-1">
                    <li>
                        <a href="index.html"
                            class="flex items-center space-x-3 px-4 py-3 text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="courses.html"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <span>Subjects</span>
                        </a>
                    </li>
                    <li>
                        <a href="assignments.html"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span>Assignments</span>
                        </a>
                    </li>
                    <li>
                        <a href="grades.html"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            <span>Results</span>
                        </a>
                    </li>
                    <li>
                        <a href="report-card.html"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span>Report Card</span>
                        </a>
                    </li>
                    <li>
                        <a href="schedule.html"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Timetable</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.html"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Profile</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                <a href="login.html"
                    class="flex items-center space-x-3 px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="md:ml-64">
        <!-- Top Navigation -->
        <nav
            class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 sticky top-0 z-30">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center space-x-4">
                        <button id="hamburger"
                            class="md:hidden p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h1 class="text-xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Dark Mode Toggle -->
                        <button id="themeToggle"
                            class="p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <svg class="w-6 h-6 hidden dark:block" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            <svg class="w-6 h-6 block dark:hidden" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                                </path>
                            </svg>
                        </button>

                        <!-- Notifications Dropdown -->
                        <div class="relative">
                            <button id="notificationBtn"
                                class="p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg relative">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>

                            <!-- Notification Dropdown -->
                            <div id="notificationDropdown"
                                class="hidden absolute right-[-80px] mt-2 w-80 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Notifications</h3>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <a href="#"
                                        class="block p-4 hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-gray-100 dark:border-gray-700">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white">New
                                                    Assignment Posted</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Mathematics -
                                                    Calculus Problem Set 5</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">2 hours ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="block p-4 hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-gray-100 dark:border-gray-700">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white">Grade
                                                    Published</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Chemistry Test
                                                    - 85%</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">5 hours ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="block p-4 hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-gray-100 dark:border-gray-700">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white">Upcoming
                                                    Event</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">WAEC Mock
                                                    Exams start next week</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">1 day ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="block p-4 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white">Class
                                                    Announcement</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">PTA meeting
                                                    scheduled for Nov 20</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">2 days ago</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-3 bg-gray-50 dark:bg-gray-900/50 text-center">
                                    <a href="#"
                                        class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:text-primary-700">View
                                        all notifications</a>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Dropdown -->
                        <div class="relative">
                            <button id="profileBtn"
                                class="flex items-center space-x-3 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2">
                                <div
                                    class="w-9 h-9 bg-gradient-to-br from-primary-400 to-purple-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">AO</span>
                                </div>
                                <div class="hidden sm:block text-left">
                                    <div class="text-sm font-semibold text-gray-900 dark:text-white">Adewale Olumide
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">SS 2 Science</div>
                                </div>
                                <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Profile Dropdown Menu -->
                            <div id="profileDropdown"
                                class="hidden absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">Adewale Olumide</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">2024/SS2/0385</p>
                                </div>
                                <div class="py-2">
                                    <a href="profile.html"
                                        class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        <span class="text-sm font-medium">My Profile</span>
                                    </a>
                                    <a href="grades.html"
                                        class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                        <span class="text-sm font-medium">My Results</span>
                                    </a>
                                    <a href="#"
                                        class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="text-sm font-medium">Settings</span>
                                    </a>
                                </div>
                                <div class="border-t border-gray-200 dark:border-gray-700">
                                    <a href="login.html"
                                        class="flex items-center space-x-3 px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        <span class="text-sm font-medium">Logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="p-4 sm:p-6 lg:p-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome back, Adewale! 👋</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Here's what's happening with your studies today.</p>
            </div>

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
                        <div
                            class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
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
                        <div
                            class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
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
                        <div
                            class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
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
                        <div
                            class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
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
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Upcoming Assignments</h2>
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
                                            <span class="text-xs text-gray-500 dark:text-gray-400">65% completed</span>
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
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Simple Harmonic Motion
                                            experiment</p>
                                        <div class="flex items-center space-x-4 mt-2">
                                            <span
                                                class="text-xs font-medium text-orange-600 dark:text-orange-400 bg-orange-50 dark:bg-orange-900/30 px-2 py-1 rounded">Due
                                                in 3 days</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">Not started</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="flex items-start space-x-3">
                                    <div
                                        class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <span
                                            class="text-green-600 dark:text-green-400 font-semibold text-sm">EN</span>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">English Language Essay
                                        </h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Argumentative essay -
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
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
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
                                            <span
                                                class="text-purple-600 dark:text-purple-400 font-semibold text-sm">CH</span>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Chemistry Test</h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Organic Chemistry</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-green-600 dark:text-green-400">85%</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Distinction</div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <span
                                                class="text-yellow-600 dark:text-yellow-400 font-semibold text-sm">BI</span>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Biology Quiz</h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Genetics & Heredity</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-green-600 dark:text-green-400">78%</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Credit</div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <span
                                                class="text-red-600 dark:text-red-400 font-semibold text-sm">MA</span>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Mathematics CAT
                                            </h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Continuous Assessment
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
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
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
                                <div
                                    class="flex-1 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 rounded-r-lg p-3">
                                    <div class="font-semibold text-gray-900 dark:text-white text-sm">Mathematics</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Room 12 - Mr. Adeyemi
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="text-center flex-shrink-0">
                                    <div class="text-xs font-medium text-gray-500 dark:text-gray-400">09:30</div>
                                    <div class="text-xs text-gray-400 dark:text-gray-500">AM</div>
                                </div>
                                <div
                                    class="flex-1 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 rounded-r-lg p-3">
                                    <div class="font-semibold text-gray-900 dark:text-white text-sm">English Language
                                    </div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Room 8 - Mrs. Okonkwo
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="text-center flex-shrink-0">
                                    <div class="text-xs font-medium text-gray-500 dark:text-gray-400">11:00</div>
                                    <div class="text-xs text-gray-400 dark:text-gray-500">AM</div>
                                </div>
                                <div
                                    class="flex-1 bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 rounded-r-lg p-3">
                                    <div class="font-semibold text-gray-900 dark:text-white text-sm">Physics</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Lab 2 - Mr. Okoro</div>
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
                                    <div class="font-semibold text-gray-900 dark:text-white text-sm">Chemistry</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Lab 1 - Dr. Bello</div>
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
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-bold text-gray-900 dark:text-white">Announcements</h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="border-l-4 border-primary-500 pl-4">
                                <div class="flex items-center space-x-2 mb-1">
                                    <span
                                        class="text-xs font-semibold text-primary-600 dark:text-primary-400">IMPORTANT</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">2 hours ago</span>
                                </div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">WAEC Mock Exams Schedule
                                </p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Check notice board for exam
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
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Next Saturday at 10:00 AM in
                                    the hall.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-12">
            <div class="px-4 sm:px-6 lg:px-8 py-6">
                <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                    <p>&copy; 2025 Student Portal. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.getElementById('hamburger');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768) {
                if (!sidebar.contains(e.target) && !hamburger.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            }
        });

        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const htmlElement = document.documentElement;

        // Check for saved theme preference or default to 'light' mode
        const currentTheme = localStorage.getItem('theme') || 'light';
        if (currentTheme === 'dark') {
            htmlElement.classList.add('dark');
        }

        themeToggle.addEventListener('click', () => {
            htmlElement.classList.toggle('dark');
            const theme = htmlElement.classList.contains('dark') ? 'dark' : 'light';
            localStorage.setItem('theme', theme);
        });

        // Notification Dropdown Toggle
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationDropdown = document.getElementById('notificationDropdown');

        notificationBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            notificationDropdown.classList.toggle('hidden');
            profileDropdown.classList.add('hidden');
        });

        // Profile Dropdown Toggle
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
            notificationDropdown.classList.add('hidden');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', () => {
            notificationDropdown.classList.add('hidden');
            profileDropdown.classList.add('hidden');
        });
    </script>
</body>

</html>
