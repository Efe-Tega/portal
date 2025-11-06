<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Home</title>

    <script>
        // Immediately apply the saved theme before rendering
        const savedTheme = localStorage.getItem("theme");
        if (savedTheme === "dark") {
            document.documentElement.classList.add("dark");
        }
    </script>

    @vite('resources/css/app.css')

</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('user.includes.sidebar')

    <!-- Main Content -->
    <div class="md:ml-64">
        <!-- Top Navigation -->
        @include('user.includes.header')

        <!-- Page Content -->
        <main class="p-4 sm:p-6 lg:p-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome back, Adewale! 👋</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Here's what's happening with your studies today.</p>
            </div>

            @yield('main-content')

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
    <script src="{{ asset('assets/js/theme.js') }}"></script>
</body>

</html>
