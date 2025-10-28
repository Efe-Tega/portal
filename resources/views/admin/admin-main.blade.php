<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - School Portal</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('admin.include.sidebar')

    <div class="md:ml-64">
        <!-- Top Navigation -->
        @include('admin.include.header')

        <main class="p-4 sm:p-6 lg:p-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome to Excellence Academy Admin
                    Portal! 👋</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Second Term, 2024/2025 Academic Session - Week 8</p>
            </div>

            @yield('admin-content')
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-12">
            <div class="px-4 sm:px-6 lg:px-8 py-6">
                <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                    <p>&copy; 2025 Excellence Academy. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.getElementById('hamburger');
        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768) {
                if (!sidebar.contains(e.target) && !hamburger.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            }
        });

        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;
        const currentTheme = localStorage.getItem('theme') || 'light';
        if (currentTheme === 'dark') html.classList.add('dark');
        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        });

        // Notification Dropdown
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationDropdown = document.getElementById('notificationDropdown');
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        notificationBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            notificationDropdown.classList.toggle('hidden');
            profileDropdown.classList.add('hidden');
        });

        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
            notificationDropdown.classList.add('hidden');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!notificationBtn.contains(e.target) && !notificationDropdown.contains(e.target)) {
                notificationDropdown.classList.add('hidden');
            }
            if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });

        // Close dropdowns on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                notificationDropdown.classList.add('hidden');
                profileDropdown.classList.add('hidden');
            }
        });

        // Submenu Toggle Function
        function toggleSubmenu(menuId) {
            const menu = document.getElementById(menuId);
            const icon = document.getElementById(menuId + 'Icon');

            // Close all other submenus
            const allMenus = ['studentsMenu', 'teachersMenu', 'academicsMenu', 'financeMenu'];
            allMenus.forEach(id => {
                if (id !== menuId) {
                    const otherMenu = document.getElementById(id);
                    const otherIcon = document.getElementById(id + 'Icon');
                    if (otherMenu) {
                        otherMenu.classList.add('hidden');
                        if (otherIcon) otherIcon.classList.remove('rotate-180');
                    }
                }
            });

            // Toggle current menu
            menu.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    </script>
</body>

</html>
