<!-- Student Header -->
<div class="bg-gradient-to-br from-primary-500 to-purple-600 rounded-xl shadow-lg p-6 mb-6 text-white">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold mb-2">{{ $student->firstname }}.</h2>
            <p class="text-white text-opacity-90">SS 1 Art - First Term 2025/2006</p>
        </div>
        <div class="text-right">
            <p class="text-sm text-white text-opacity-80">Session: 2025/2006</p>
            <p class="text-sm text-white text-opacity-80">Term: First Term</p>
        </div>
    </div>
</div>


<!-- Affective Traits -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Affective Traits Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Affective Traits (Behaviour)</h3>
            <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Rating Legend -->
        <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg border border-gray-200 dark:border-gray-700">
            <p class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-2">RATING SCALE:</p>
            <div class="grid grid-cols-5 gap-2 text-xs">
                <div class="text-center">
                    <span class="font-bold text-green-600 dark:text-green-400">5</span>
                    <span class="block text-gray-600 dark:text-gray-400">Excellent</span>
                </div>
                <div class="text-center">
                    <span class="font-bold text-blue-600 dark:text-blue-400">4</span>
                    <span class="block text-gray-600 dark:text-gray-400">Very Good</span>
                </div>
                <div class="text-center">
                    <span class="font-bold text-yellow-600 dark:text-yellow-400">3</span>
                    <span class="block text-gray-600 dark:text-gray-400">Good</span>
                </div>
                <div class="text-center">
                    <span class="font-bold text-orange-600 dark:text-orange-400">2</span>
                    <span class="block text-gray-600 dark:text-gray-400">Fair</span>
                </div>
                <div class="text-center">
                    <span class="font-bold text-red-600 dark:text-red-400">1</span>
                    <span class="block text-gray-600 dark:text-gray-400">Poor</span>
                </div>
            </div>
        </div>

        <!-- Traits Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th
                            class="border border-gray-300 dark:border-gray-600 p-3 text-left text-sm font-semibold text-gray-900 dark:text-white">
                            TRAIT</th>
                        @for ($i = 5; $i >= 1; $i--)
                            <th
                                class="border border-gray-300 dark:border-gray-600 p-2 text-center text-xs font-semibold text-gray-900 dark:text-white">
                                {{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody class="text-gray-900 dark:text-white">
                    @foreach ($traits as $trait)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/30">
                            <td class="border border-gray-300 dark:border-gray-600 p-3 font-medium">{{ $trait->name }}
                            </td>
                            @for ($i = 5; $i >= 1; $i--)
                                <td class="border border-gray-300 dark:border-gray-600 p-2 text-center">
                                    <input type="radio" name="trait_{{ $trait->id }}" class="trait-radio"
                                        data-trait="{{ $trait->id }}" value="{{ $i }}"
                                        {{ isset($scores[$trait->id]) && $scores[$trait->id]->score == $i ? 'checked' : '' }}>
                                </td>
                            @endfor
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- Sports Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Sports & Games</h3>
            <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
        </div>

        <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Indicate participation in the following sports and
            games:</p>

        <!-- Sports Checklist -->
        <div class="space-y-4">
            <!-- Indoor Games -->
            <div
                class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg hover:border-primary-400 dark:hover:border-primary-500 transition-colors">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" data-sport="indoor_games"
                        class="sport-checkbox w-5 h-5 text-primary-600 border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500 focus:ring-2">
                    <span class="ml-3 text-lg font-medium text-gray-900 dark:text-white">Indoor Games</span>
                    <span
                        class="sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold">

                        <svg class="sport-icon w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>

                        <span class="sport-text"></span>
                    </span>
                </label>
                <p class="mt-2 ml-8 text-sm text-gray-600 dark:text-gray-400">Chess, Scrabble, Table Tennis, etc.</p>
            </div>

            <!-- Ball Games -->
            <div
                class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg hover:border-primary-400 dark:hover:border-primary-500 transition-colors">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" data-sport="ball_games"
                        class="sport-checkbox w-5 h-5 text-primary-600 border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500 focus:ring-2">
                    <span class="ml-3 text-lg font-medium text-gray-900 dark:text-white">Ball Games</span>

                    <span
                        class="sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold">
                        <svg class="sport-icon w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span class="sport-text"></span>
                    </span>
                </label>
                <p class="mt-2 ml-8 text-sm text-gray-600 dark:text-gray-400">Football, Basketball, Volleyball, etc.
                </p>
            </div>

            <!-- Combative Games -->
            <div
                class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg hover:border-primary-400 dark:hover:border-primary-500 transition-colors">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" data-sport="combative_games"
                        class="sport-checkbox w-5 h-5 text-primary-600 border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500 focus:ring-2">
                    <span class="ml-3 text-lg font-medium text-gray-900 dark:text-white">Combative Games</span>
                    <span
                        class="sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold">
                        <svg class="sport-icon w-4 h-4 mr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span class="sport-text"></span>
                    </span>
                </label>
                <p class="mt-2 ml-8 text-sm text-gray-600 dark:text-gray-400">Karate, Taekwondo, Wrestling, etc.</p>
            </div>

            <!-- Track -->
            <div
                class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg hover:border-primary-400 dark:hover:border-primary-500 transition-colors">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" data-sport="track"
                        class="sport-checkbox w-5 h-5 text-primary-600 border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500 focus:ring-2">
                    <span class="ml-3 text-lg font-medium text-gray-900 dark:text-white">Track</span>
                    <span
                        class="sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold">
                        <svg class="sport-icon w-4 h-4 mr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span class="sport-text"></span>
                    </span>
                </label>
                <p class="mt-2 ml-8 text-sm text-gray-600 dark:text-gray-400">Running events, Relay races, etc.</p>
            </div>

            <!-- Jumps -->
            <div
                class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg hover:border-primary-400 dark:hover:border-primary-500 transition-colors">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" data-sport="jumps"
                        class="sport-checkbox w-5 h-5 text-primary-600 border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500 focus:ring-2">
                    <span class="ml-3 text-lg font-medium text-gray-900 dark:text-white">Jumps</span>
                    <span
                        class="sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold">
                        <svg class="sport-icon w-4 h-4 mr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span class="sport-text"></span>
                    </span>
                </label>
                <p class="mt-2 ml-8 text-sm text-gray-600 dark:text-gray-400">Long Jump, High Jump, Triple Jump, etc.
                </p>
            </div>

            <!-- Throws -->
            <div
                class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg hover:border-primary-400 dark:hover:border-primary-500 transition-colors">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" data-sport="throws"
                        class="sport-checkbox w-5 h-5 text-primary-600 border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500 focus:ring-2">
                    <span class="ml-3 text-lg font-medium text-gray-900 dark:text-white">Throws</span>
                    <span
                        class="sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold">
                        <svg class="sport-icon w-4 h-4 mr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span class="sport-text"></span>
                    </span>
                </label>
                <p class="mt-2 ml-8 text-sm text-gray-600 dark:text-gray-400">Shot Put, Javelin, Discus, etc.</p>
            </div>

            <!-- Swimming -->
            <div
                class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg hover:border-primary-400 dark:hover:border-primary-500 transition-colors">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" data-sport="swimming"
                        class="sport-checkbox w-5 h-5 text-primary-600 border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500 focus:ring-2">
                    <span class="ml-3 text-lg font-medium text-gray-900 dark:text-white">Swimming</span>
                    <span
                        class="sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold">
                        <svg class="sport-icon w-4 h-4 mr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span class="sport-text"></span>
                    </span>
                </label>
                <p class="mt-2 ml-8 text-sm text-gray-600 dark:text-gray-400">Swimming events and competitions</p>
            </div>

            <!-- Weight Lifting -->
            <div
                class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg hover:border-primary-400 dark:hover:border-primary-500 transition-colors">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" data-sport="weight_lifting"
                        class="sport-checkbox w-5 h-5 text-primary-600 border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500 focus:ring-2">
                    <span class="ml-3 text-lg font-medium text-gray-900 dark:text-white">Weight Lifting</span>
                    <span
                        class="sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold">
                        <svg class="sport-icon w-4 h-4 mr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span class="sport-text"></span>
                    </span>
                </label>
                <p class="mt-2 ml-8 text-sm text-gray-600 dark:text-gray-400">Weight lifting and strength training</p>
            </div>
        </div>

        <!-- Summary -->
        <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-blue-900 dark:text-blue-300">Sports Participation</p>
                    <p id="sports-count" class="text-xs text-blue-700 dark:text-blue-400 mt-1">3 out of 8 sports</p>
                </div>
                <div class="text-right">
                    <span id="sports-percent" class="text-2xl font-bold text-blue-600 dark:text-blue-400">0%</span>
                    <p class="text-xs text-blue-700 dark:text-blue-400">Active</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Info -->
<div class="mt-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Assessment Notes</h3>
    <div class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
        <p><span class="font-semibold">Affective Traits:</span> These traits are assessed throughout the term by class
            teachers and are based on consistent observation of student behavior, attitude, and interaction with peers
            and teachers.</p>
        <p><span class="font-semibold">Sports & Games:</span> Participation is tracked based on regular attendance and
            active involvement in school sports activities and inter-house competitions.</p>
        <p class="pt-3 border-t border-gray-200 dark:border-gray-700 text-xs text-gray-600 dark:text-gray-400"><span
                class="font-semibold">Last Updated:</span> December 12, 2025</p>
    </div>
</div>
