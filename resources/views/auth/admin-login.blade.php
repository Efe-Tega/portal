<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - School Management System</title>
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
    class="bg-gradient-to-br from-gray-900 via-primary-900 to-gray-900 dark:from-black dark:via-gray-900 dark:to-black min-h-screen flex items-center justify-center p-4">
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

    <!-- Back to Student Portal Link -->
    <a href="{{ route('user.login') }}"
        class="fixed top-4 left-4 flex items-center space-x-2 px-4 py-2 bg-white/10 backdrop-blur-lg hover:bg-white/20 rounded-lg text-white transition-all z-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
            </path>
        </svg>
        <span class="text-sm font-medium">Student Login</span>
    </a>

    <div class="w-full max-w-md">
        <!-- Logo and Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('logo.png') }}" alt="School Logo" class="h-28 w-28 object-contain drop-shadow-2xl"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Excellence Academy</h1>
            <p class="text-gray-300">Admin Portal</p>
            <div
                class="mt-2 inline-block px-3 py-1 bg-red-500/20 backdrop-blur-sm border border-red-500/30 rounded-full">
                <span class="text-xs text-red-300 font-medium">🔒 Restricted Access</span>
            </div>
        </div>

        <!-- Login Card -->
        <div
            class="bg-white/10 dark:bg-black/30 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 dark:border-white/10 p-8">
            <form id="loginForm" class="space-y-6" action="{{ route('admin.login') }}" method="POST">
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

                <!-- Admin ID -->
                <div>
                    <x-auth-form-field class="focus:ring-red-500" id="adminId" label="Email Address" name="email"
                        type="email" required="true" placeholder="Enter admin ID or email">
                        <x-icons.auth-user />
                    </x-auth-form-field>
                </div>

                <!-- Password -->
                <div>
                    <x-auth-form-field class="focus:ring-red-500" label="Password" name="password" id="password"
                        required="true" placeholder="Enter Password">
                        <x-icons.lock />
                    </x-auth-form-field>
                </div>


                <!-- Login Button -->
                <button type="submit"
                    class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-sm font-medium text-white bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all transform hover:scale-[1.02]"
                    onclick="this.disabled=true; this.form.submit(); this.innerText='Logging...';">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                    Sign In to Admin Portal
                </button>
            </form>

            <!-- Security Notice -->
            <div class="mt-6 p-4 bg-yellow-500/10 border border-yellow-500/30 rounded-lg">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-yellow-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                    <div>
                        <h4 class="text-sm font-medium text-yellow-300 mb-1">Security Notice</h4>
                        <p class="text-xs text-yellow-200/80">This is a restricted area. All login attempts are
                            monitored and logged. Unauthorized access is prohibited.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portal Links -->
        <div class="mt-6 grid grid-cols-2 gap-3">
            <a href="teacher-login.html"
                class="flex items-center justify-center space-x-2 px-4 py-3 bg-white/10 backdrop-blur-lg hover:bg-white/20 rounded-lg text-white transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                <span class="text-sm font-medium">Teacher Login</span>
            </a>
            <a href="{{ route('user.login') }}"
                class="flex items-center justify-center space-x-2 px-4 py-3 bg-white/10 backdrop-blur-lg hover:bg-white/20 rounded-lg text-white transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                <span class="text-sm font-medium">Student Login</span>
            </a>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-xs text-gray-400">
            <p>&copy; 2025 Excellence Academy. All rights reserved.</p>
            <p class="mt-1">School Management System v2.0</p>
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
        document.getElementById('adminId').focus();
    </script>
</body>

</html>
