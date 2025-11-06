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

    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script>
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
