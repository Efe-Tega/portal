<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Portal</title>
    @vite('resources/css/app.css')
</head>

<body
    class="bg-gradient-to-br from-primary-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-4">
        <!-- Dark Mode Toggle -->
        <button id="themeToggle"
            class="fixed top-4 right-4 p-3 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all">
            <svg class="w-6 h-6 text-gray-700 dark:text-gray-300 hidden dark:block" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg>
            <svg class="w-6 h-6 text-gray-700 dark:text-gray-300 block dark:hidden" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
        </button>

        <div class="w-full max-w-md">
            <!-- Logo and Title -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <img src="logo.png" alt="School Logo" class="h-24 w-24 object-contain"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                </div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Excellence Academy</h1>
            </div>

            <!-- Login Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Welcome Back!</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Login to access your dashboard</p>

                <form action="{{ route('login') }}" method="POST" autocomplete="off">
                    @csrf

                    @if ($errors->any())
                        <div class="text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-3 rounded mb-4">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Student ID -->
                    <div class="mb-4">
                        <label for="studentId"
                            class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Student ID</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" id="studentId" name="registration_number" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                placeholder="e.g., 2024/SS2/0123">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password"
                            class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                placeholder="Enter your password">
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input type="checkbox"
                                class="w-4 h-4 text-primary-600 border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                        </label>
                        <a href="#"
                            class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300">Forgot
                            Password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-primary-600 to-purple-600 text-white font-semibold py-3 rounded-lg hover:from-primary-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                        onclick="this.disabled=true; this.form.submit(); this.innerText='Logging...';">
                        Login to Dashboard
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center mt-6 space-y-3">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Need help? Contact your school administrator
                </p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/auth.js') }}"></script>
</body>

</html>
