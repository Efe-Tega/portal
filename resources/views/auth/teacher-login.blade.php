<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login - Staff Portal</title>
    <script>
        // Immediately apply the saved theme before rendering
        const savedTheme = localStorage.getItem("theme");
        if (savedTheme === "dark") {
            document.documentElement.classList.add("dark");
        }
    </script>
    @vite('resources/css/app.css')
</head>

<body
    class="bg-gradient-to-br from-emerald-900 via-teal-900 to-emerald-900 dark:from-black dark:via-gray-900 dark:to-black min-h-screen flex items-center justify-center p-4">
    <!-- Dark Mode Toggle -->
    <button id="themeToggle"
        class="fixed top-4 right-4 p-3 bg-white/10 backdrop-blur-lg hover:bg-white/20 rounded-full text-white transition-all z-50">
        <svg class="w-6 h-6 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
            </path>
        </svg>
        <svg class="w-6 h-6 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
        </svg>
    </button>

    <div class="w-full max-w-md">
        <!-- Logo and Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('logo.png') }}" alt="School Logo" class="h-28 w-28 object-contain drop-shadow-2xl"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Excellence Academy</h1>
            <p class="text-gray-300">Teacher Portal - Staff Access System</p>
            <div
                class="mt-2 inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-500/30 rounded-full">
                <span class="text-xs text-emerald-300 font-medium">👨‍🏫 Teaching Staff Only</span>
            </div>
        </div>

        <!-- Login Card -->
        <div
            class="bg-white/10 dark:bg-black/30 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 dark:border-white/10 p-8">
            <form id="loginForm" class="space-y-6" action="{{ route('teacher.login') }}" method="POST">
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

                <!-- Staff ID -->
                <div>
                    <label for="staffId" class="block text-sm font-medium text-gray-200 mb-2">
                        Staff Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                </path>
                            </svg>
                        </div>
                        <input type="email" id="staffId" name="email" required
                            class="block w-full pl-10 pr-3 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
                            placeholder="Enter email adress">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-200 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required
                            class="block w-full pl-10 pr-12 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
                            placeholder="Enter password">
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="eyeOpen" class="w-5 h-5 text-gray-400 hover:text-gray-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <svg id="eyeClosed" class="w-5 h-5 text-gray-400 hover:text-gray-300 hidden" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 bg-white/10 border-white/20 rounded text-emerald-600 focus:ring-emerald-500 focus:ring-offset-0">
                        <label for="remember" class="ml-2 block text-sm text-gray-300">
                            Remember me
                        </label>
                    </div>
                    <div class="text-sm">
                        <a href="#"
                            class="font-medium text-emerald-400 hover:text-emerald-300 transition-colors">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-sm font-medium text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all transform hover:scale-[1.02]">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Sign In to Teacher Portal
                </button>
            </form>

            <!-- Quick Info -->
            <div class="mt-6 p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-lg">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h4 class="text-sm font-medium text-emerald-300 mb-1">Access Information</h4>
                        <p class="text-xs text-emerald-200/80">Use your staff credentials provided by the school
                            administration. Contact HR if you need assistance.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-xs text-gray-400">
            <p>&copy; 2025 Excellence Academy. All rights reserved.</p>
            <p class="mt-1">Teacher Portal v2.0</p>
        </div>
    </div>

    <script src="{{ asset('system_assets/assets/js/auth.js') }}"></script>

    <script>
        // Password Toggle
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        togglePassword.addEventListener('click', () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            eyeOpen.classList.toggle('hidden');
            eyeClosed.classList.toggle('hidden');
        });

        // Auto-focus on first input
        document.getElementById('staffId').focus();
    </script>
</body>

</html>
