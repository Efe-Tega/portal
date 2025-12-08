<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0">
    <div class="h-full bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-3">
                <div
                    class="w-10 h-10 bg-gradient-to-br from-primary-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold">AP</span>
                </div>
                <div>
                    <div class="font-bold text-gray-900 dark:text-white">
                        {{ Auth::guard('admin')->check() ? 'Admin Portal' : 'Teacher Portal' }}</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">Excellence Academy</div>
                </div>
            </div>
        </div>
        <nav class="flex-1 p-4 overflow-y-auto">
            <ul class="space-y-1">
                @auth('admin')
                    <!-- Dashboard -->
                    <x-sidebar-link route="admin.dashboard" label="Dashboard" icon="home" />
                    <!-- Students with Dropdown -->
                    <x-sidebar-submenu id="studentsMenu" title="Students" icon="users" :routes="['admin.students.*']">
                        <x-sidebar-submenu-item route="admin.students.all_students" label="All Students" />
                        <x-sidebar-submenu-item route="admin.students.add_student" label="Add New Student" />
                    </x-sidebar-submenu>

                    <!-- Teachers with Dropdown -->
                    <x-sidebar-submenu id="teachersMenu" title="Teachers" icon="pupils" :routes="['admin.teachers.*']">
                        <x-sidebar-submenu-item route="admin.teachers.all_teachers" label="All Teachers" />
                        <x-sidebar-submenu-item route="admin.teachers.all_teachers" label="Add New Teachers" />
                    </x-sidebar-submenu>

                    <!-- Academics with Dropdown -->
                    <li>
                        <button
                            class="w-full flex items-center justify-between px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium"
                            onclick="toggleSubmenu('academicsMenu')">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                                <span>Academics</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform" id="academicsMenuIcon" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <ul id="academicsMenu" class="hidden ml-4 mt-2 space-y-1">
                            <li><a href="classes.html"
                                    class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg">
                                    <span class="w-1.5 h-1.5 bg-gray-400 dark:bg-gray-500 rounded-full"></span>
                                    <span>Classes</span>
                                </a></li>
                            <li><a href="subjects.html"
                                    class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg">
                                    <span class="w-1.5 h-1.5 bg-gray-400 dark:bg-gray-500 rounded-full"></span>
                                    <span>Subjects</span>
                                </a></li>
                            <li><a href="results.html"
                                    class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg">
                                    <span class="w-1.5 h-1.5 bg-gray-400 dark:bg-gray-500 rounded-full"></span>
                                    <span>Results</span>
                                </a></li>
                        </ul>
                    </li>

                    <!-- Settings -->
                    <li><a href="settings.html"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg font-medium"><svg
                                class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg><span>Settings</span></a></li>
                @endauth

                @auth('teacher')
                    <x-sidebar-link route="teacher.dashboard" label="Dashboard" icon="home" />
                    <x-sidebar-link route="teacher.classes" label="My Classes" icon="pupils" />
                    <x-sidebar-link route="admin.dashboard" label="Attendance" icon="clipboard_check" />
                    <x-sidebar-link route="admin.dashboard" label="Grade Input" icon="signal_bars" />
                    <x-sidebar-link route="admin.dashboard" label="Assignments" icon="file" />
                    <x-sidebar-link route="admin.dashboard" label="Timetable" icon="calender" />
                    <x-sidebar-link route="admin.dashboard" label="Profile" icon="user" />
                @endauth

            </ul>
        </nav>
        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('teacher.logout') }}"
                class="flex items-center space-x-3 px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg font-medium"><svg
                    class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span>Logout</span>
            </a>
        </div>
    </div>
</aside>
