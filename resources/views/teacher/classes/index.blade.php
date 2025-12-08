@extends('layouts.app')
@section('header', 'My Classes')
@section('teacher-content')

    <!-- Page Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">My Classes</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Manage your students and view class information</p>
    </div>

    <!-- Class Tabs -->
    <div class="mb-6 border-b border-gray-200 dark:border-gray-700">
        <nav class="-mb-px flex space-x-8">
            <button
                class="tab-btn active border-b-2 border-primary-600 py-4 px-1 text-sm font-medium text-primary-600 dark:text-primary-400"
                data-tab="ss2a">
                SS 2 Science A
            </button>
            <button
                class="tab-btn border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300"
                data-tab="ss2b">
                SS 2 Science B
            </button>
            <button
                class="tab-btn border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300"
                data-tab="ss3">
                SS 3 Science
            </button>
        </nav>
    </div>

    <!-- Class Content -->
    <div id="ss2a" class="tab-content">
        <!-- Class Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Students</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">45</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Class Average</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">78.5%</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Attendance Rate</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">94%</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Boys / Girls</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">23 / 22</p>
            </div>
        </div>

        <!-- Students Table -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Student List</h3>
                <div class="flex space-x-2">
                    <input type="text" placeholder="Search students..."
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <button
                        class="px-4 py-2 bg-primary-600 text-white rounded-lg text-sm font-medium hover:bg-primary-700">Export</button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-900/50">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                #</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Student Name</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Admission No</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Gender</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Current Average</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Attendance</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">1</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-primary-100 dark:bg-primary-900/30 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-primary-600 dark:text-primary-400 font-semibold text-sm">AA</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">Adebayo Akinwale
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">2024/SS2/0101</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">Male</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">85.2%</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">96%</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button class="text-primary-600 dark:text-primary-400 hover:text-primary-900">View
                                    Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">2</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-purple-600 dark:text-purple-400 font-semibold text-sm">AO</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">Adewale Olumide
                                            Joseph</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">2024/SS2/0385</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">Male</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400">78.5%</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">98%</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button class="text-primary-600 dark:text-primary-400 hover:text-primary-900">View
                                    Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-pink-100 dark:bg-pink-900/30 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm">CA</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">Chukwuemeka Amanda
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">2024/SS2/0112</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">Female</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">88.7%</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">100%</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button class="text-primary-600 dark:text-primary-400 hover:text-primary-900">View
                                    Details</button>
                            </td>
                        </tr>
                        <!-- More student rows would be here -->
                    </tbody>
                </table>
            </div>
            <div
                class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <div class="text-sm text-gray-700 dark:text-gray-300">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span
                        class="font-medium">45</span> results
                </div>
                <div class="flex space-x-2">
                    <button
                        class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded text-sm text-gray-700 dark:text-gray-300">Previous</button>
                    <button class="px-3 py-1 bg-primary-600 text-white rounded text-sm">1</button>
                    <button
                        class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded text-sm text-gray-700 dark:text-gray-300">2</button>
                    <button
                        class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded text-sm text-gray-700 dark:text-gray-300">Next</button>
                </div>
            </div>
        </div>
    </div>

    <div id="ss2b" class="tab-content hidden">
        <div class="text-center py-12">
            <p class="text-gray-600 dark:text-gray-400">SS 2 Science B class content would be displayed here</p>
        </div>
    </div>

    <div id="ss3" class="tab-content hidden">
        <div class="text-center py-12">
            <p class="text-gray-600 dark:text-gray-400">SS 3 Science class content would be displayed here</p>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // Tab Switching
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');


        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.getAttribute('data-tab');

                // Update button states
                tabButtons.forEach(btn => {
                    btn.classList.remove('border-primary-600', 'text-primary-600',
                        'dark:text-primary-400', 'active');
                    btn.classList.add('border-transparent', 'text-gray-500', 'dark:text-gray-400');
                });
                button.classList.remove('border-transparent', 'text-gray-500', 'dark:text-gray-400');
                button.classList.add('border-primary-600', 'text-primary-600', 'dark:text-primary-400',
                    'active');

                // Update content visibility
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                document.getElementById(tabId).classList.remove('hidden');
            });
        });
    </script>
@endpush
