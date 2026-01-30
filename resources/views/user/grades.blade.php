@extends('user.user-main')
@section('main-content')
    <!-- Welcome Section -->
    <x-page-header>
        <x-slot:title>Academic Performance</x-slot:title>
        <x-slot:subtitle>Second Term 2024/2025 Session</x-slot:subtitle>
    </x-page-header>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-br from-primary-500 to-purple-600 rounded-xl p-4 shadow-lg text-white">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold opacity-90">Term Average</h3>
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center"><svg class="w-6 h-6"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg></div>
            </div>
            <div class="text-5xl font-bold mb-2">{{ $previousTermAverage }}%</div>
            <div class="flex items-center text-sm">
                @if ($averageChange > 0)
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                    </svg>
                @endif
                <span>{{ $averageChange }}% from last term</span>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-400">Class Position</h3>
                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center"><svg
                        class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg></div>
            </div>
            @php
                [$num, $suffix] = ordinal($classPosition);
            @endphp
            <div class="text-4xl font-bold text-gray-900 dark:text-white mb-2">{{ $num }}<sup
                    class="text-sm align-super">{{ $suffix }}</sup><span
                    class="text-2xl text-gray-400 dark:text-gray-500">/{{ $totalStudents }}</span></div>
            <p class="text-sm text-gray-600 dark:text-gray-400">Top {{ $topPercent }}% of class</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-400">Grade Classification</h3>
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center"><svg
                        class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg></div>
            </div>
            <div class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Credit</div>
            <p class="text-sm text-gray-600 dark:text-gray-400">Very Good Performance</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-400">Sports Participation</h3>
                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" viewBox="0 0 512 512" fill="#ff0000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <style type="text/css">
                                .st0 {
                                    fill: #ff0000;
                                }
                            </style>
                            <g>
                                <path class="st0"
                                    d="M188.858,102.634c26.588,10.645,56.793-2.287,67.428-28.874C266.941,47.171,254,16.966,227.411,6.33 c-26.597-10.654-56.782,2.278-67.438,28.876C149.339,61.794,162.251,91.98,188.858,102.634z" />
                                <path class="st0"
                                    d="M502.664,130.434L433.106,13.819c-5.298-9.872-16.011-14.946-26.5-13.607c-0.245,0.02-0.489,0.078-0.723,0.098 c-0.773,0.127-1.555,0.294-2.326,0.479c-0.46,0.127-0.929,0.225-1.378,0.371c-1.604,0.5-3.177,1.144-4.702,1.965 c-2.835,1.526-6.031,3.618-8.045,5.905l-76.508,59.256l-55.668,42.775c-23.382,15.122-41.496,14.389-62.58,9.56L30.582,74.052 C19.918,70.836,8.647,76.877,5.441,87.551c-3.206,10.664,2.834,21.935,13.509,25.151l156.39,60.624 c6.882,2.014,18.445,18.456,26.362,27.233c11.564,12.864,55.62,78.493,159.9,80.839c6.402,0.147,7.996,1.76,8.788,6.159 l19.677,200.758c0,13.078,10.606,23.684,23.685,23.684c13.069,0,23.684-10.606,23.684-23.684c0,0,2.336-257.004,2.63-261.383 c0.352-5.386,3.734-8.445,8.524-12.707c0,0,40.244-39.609,40.947-40.068C509.81,160.736,510.768,143.748,502.664,130.434z M372.159,181.245c-4.887,3.538-22.59,6.95-29.863,6.822c-42.638-0.684-46.294-35.238-33.401-48.132l35.913-33.723l51.622-47.438 l36.188,74.955L372.159,181.245z" />
                            </g>
                        </g>
                    </svg>
                </div>

            </div>
            <div class="text-4xl font-bold text-gray-900 dark:text-white mb-2">50%</div>
            <p class="text-sm text-gray-600 dark:text-gray-400">Active</p>
        </div>

    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-8">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Subject Results</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-900/50">
                    <tr>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                            S/N</th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                            Subject</th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                            Teacher</th>
                        <th class="px-4 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                            CAT (30)</th>
                        <th class="px-4 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                            Exam (70)</th>
                        <th class="px-4 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                            Total (100)</th>
                        <th class="px-4 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                            Grade</th>
                        <th class="px-4 py-4 text-right text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                            Remark</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($records as $subjectId => $record)
                        @php
                            $caRow = $record->firstWhere('exam_id', 1);
                            $examRow = $record->firstWhere('exam_id', 2);

                            $caScore = $caRow->correct_answer ?? 0;
                            $examScore = $examRow->correct_answer ?? 0;

                            $total = $caScore + $examScore;

                            $grade = getGrade($total);
                        @endphp

                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">1</td>
                            <td class="px-4 py-4">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <div class="font-semibold text-gray-900 dark:text-white">
                                            {{ $record->first()->subject->name ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                                {{ $record->first()->subject->teacher->name ?? 'N/A' }}
                            </td>
                            <td class="px-4 py-4 text-center text-sm text-gray-700 dark:text-gray-300">{{ $caScore }}
                            </td>
                            <td class="px-4 py-4 text-center text-sm text-gray-700 dark:text-gray-300">{{ $examScore }}
                            </td>
                            <td class="px-4 py-4 text-center"><span
                                    class="text-lg font-bold text-gray-900 dark:text-white">{{ $total }}</span>
                            </td>
                            <td class="px-4 py-4 text-center">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                        {{ gradeColorClass($grade) }}">
                                    {{ $grade }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-right text-sm text-gray-600 dark:text-gray-400">
                                {{ getRemark($total) }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    @php
        function percent($count, $total)
        {
            return $total > 0 ? round(($count / $total) * 100) : 0;
        }
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Grade Distribution</h3>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <div class="flex justify-between mb-2"><span
                            class="text-sm font-medium text-gray-700 dark:text-gray-300">Distinction (75-100%)</span><span
                            class="text-sm font-semibold text-gray-900 dark:text-white">{{ $gradeDistribution['distinction'] }}
                            Subjects</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                        <div class="bg-green-500 h-3 rounded-full"
                            style="width: {{ percent($gradeDistribution['distinction'], $totalSubjects) }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2"><span
                            class="text-sm font-medium text-gray-700 dark:text-gray-300">Credit (60-74%)</span><span
                            class="text-sm font-semibold text-gray-900 dark:text-white">{{ $gradeDistribution['credit'] }}
                            Subjects</span></div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                        <div class="bg-blue-500 h-3 rounded-full"
                            style="width: {{ percent($gradeDistribution['credit'], $totalSubjects) }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2"><span
                            class="text-sm font-medium text-gray-700 dark:text-gray-300">Pass (40-59%)</span><span
                            class="text-sm font-semibold text-gray-900 dark:text-white">{{ $gradeDistribution['pass'] }}
                            Subjects</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                        <div class="bg-yellow-500 h-3 rounded-full"
                            style="width: {{ percent($gradeDistribution['pass'], $totalSubjects) }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2"><span
                            class="text-sm font-medium text-gray-700 dark:text-gray-300">Fail (0-39%)</span><span
                            class="text-sm font-semibold text-gray-900 dark:text-white">{{ $gradeDistribution['fail'] }}
                            Subjects</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                        <div class="bg-red-500 h-3 rounded-full"
                            style="width: {{ percent($gradeDistribution['fail'], $totalSubjects) }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Term Preogress -->

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Term Progress</h3>
            </div>
            <div class="p-6">
                <div class="text-center mb-4">
                    <div class="text-5xl font-bold text-primary-600 dark:text-primary-400 mb-2">{{ $progressPercent }}%
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Term Completed</p>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-4 mb-4">
                    <div class="bg-gradient-to-r from-primary-500 to-purple-600 h-4 rounded-full"
                        style="width: {{ $progressPercent }}%">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $weeksPassed }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Weeks Passed</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $weeksLeft }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Weeks Left</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
