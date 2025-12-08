<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') - School Portal</title>
    <script>
        // Immediately apply the saved theme before rendering
        const savedTheme = localStorage.getItem("theme");
        if (savedTheme === "dark") {
            document.documentElement.classList.add("dark");
        }
    </script>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('layouts.include.sidebar')

    <div class="md:ml-64">
        <!-- Top Navigation -->
        @include('layouts.include.header')

        <main class="p-4 sm:p-6 lg:p-8">
            @auth('admin')
                @yield('admin-content')
            @endauth

            @auth('teacher')
                @yield('teacher-content')
            @endauth
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

    <script src="{{ asset('system_assets/assets/js/theme.js') }}"></script>

    <script>
        // Auto-check every 1 minute
        setInterval(function() {
            fetch(window.location.href, {
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(response => {
                // 419 means session expired → reload page
                if (response.status === 419) {
                    window.location.reload();
                }
            }).catch(() => {});
        }, 60000); // check every 60 seconds

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
    @stack('scripts')
</body>

</html>
