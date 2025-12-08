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

                <!-- Email ID -->
                <div>
                    <x-auth-form-field class="focus:ring-emerald-500" id="staffId" type="email" value=""
                        label="Email address" name="email" placeholder="Enter email address">
                        <x-icons.email />
                    </x-auth-form-field>
                </div>

                <!-- Password -->
                <div>
                    <x-auth-form-field class="focus:ring-emerald-500" type="password" name="password" id="password"
                        placeholder="Enter password" label="Password">
                        <x-icons.lock />
                    </x-auth-form-field>
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
                        <a href="#" class="font-medium text-emerald-400 hover:text-emerald-300 transition-colors">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-sm font-medium text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all transform hover:scale-[1.02]"
                    onclick="this.disabled=true; this.form.submit(); this.innerText='Logging...';">
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
</body>

</html>
