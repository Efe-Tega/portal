@extends('layouts.app')
@section('title', 'My Classes')
@section('header', 'My Classes')
@section('teacher-content')

    <!-- Page Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">My Classes</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Manage your students and view class information</p>
    </div>

    <!-- Class Selector -->
    <div class="mb-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <form id="classSelectForm" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <div class="md:col-span-2">
                <label for="classSelect" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select
                    Class</label>
                <select id="classSelect" name="class_id"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">Choose a class</option>
                    @foreach ($classes as $c)
                        <option value="{{ $c->id }}" {{ $selectedClassId == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex space-x-3">
                <button type="submit"
                    class="w-full px-4 py-2 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700">Search</button>
            </div>
        </form>
    </div>

    <!-- Class Content -->
    <div id="" class="tab-content">

        @php
            $totalStudent = App\Models\User::where('class_id', $selectedClassId)->count();
        @endphp
        <!-- Class Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Students</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalStudent }}</p>
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
        <x-data-table title="Student List" :columns="['#', 'Student Name', 'Admission No', 'Class', 'Gender', 'Current Average', 'Attendance']" :item="$students">
            <!-- Table Body -->
            @foreach ($students as $key => $student)
                @php
                    $fullname = $student->lastname . ' ' . $student->firstname;
                    $initials = collect(explode(' ', $fullname))->map(fn($p) => strtoupper($p[0]))->join('');
                @endphp

                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                        {{ $key + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-primary-100 dark:bg-primary-900/30 rounded-full flex items-center justify-center flex-shrink-0">
                                <span
                                    class="text-primary-600 dark:text-primary-400 font-semibold text-sm">{{ $initials }}</span>
                            </div>

                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $fullname }}
                                </div>
                            </div>

                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                        {{ $student->registration_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                        {{ $student->class->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                        {{ $student->gender }}</td>
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
            @endforeach
        </x-data-table>
    </div>
@endsection
