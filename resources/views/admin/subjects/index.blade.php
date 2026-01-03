@extends('layouts.app')
@section('title', 'Subject Management')
@section('header', 'Subject Management')
@section('admin-content')

    <!-- Page Header -->
    <x-page-header>
        <x-slot:title>Subject Management</x-slot:title>
        <x-slot:subtitle>Manage all subjects</x-slot:subtitle>
    </x-page-header>

    <!-- Add Subject Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Add Subject</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">All fields are required.</p>

        <form action="{{ route('admin.register.subject') }}" method="POST">
            @csrf

            @if (session('success'))
                <div class="flex items-center justify-between bg-emerald-500 text-white dark:bg-emerald-600 text-sm font-medium px-4 py-3 rounded-lg shadow-md mb-4"
                    role="alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="text-white hover:text-emerald-200 focus:outline-none"
                        onclick="this.parentElement.remove();" aria-label="Close">
                        ✕
                    </button>
                </div>
            @elseif (session('warning'))
                <div class="flex items-center justify-between bg-yellow-600 text-white dark:bg-yellow-600 text-sm font-medium px-4 py-3 rounded-lg shadow-md mb-4"
                    role="alert">
                    <span>{{ session('warning') }}</span>
                    <button type="button" class="text-white hover:text-emerald-200 focus:outline-none"
                        onclick="this.parentElement.remove();" aria-label="Close">
                        ✕
                    </button>
                </div>
            @endif

            <div class="row flex flex-wrap -mx-2">
                <div class="col w-full md:w-1/2  px-2 mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject Name</label>
                    <input type="text" placeholder="Enter subject name" name="subject_name"
                        value="{{ old('subject_name') }}"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    @error('subject_name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col w-full md:w-1/2  px-2 mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Class</label>
                    <select name="class_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option selected disabled>Choose...</option>
                        @foreach ($classes as $c)
                            <option value="{{ $c->id }}" {{ old('class_id') == $c->id ? 'selected' : '' }}>
                                {{ $c->name }}</option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col w-full md:w-1/3  px-2 mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">School</label>
                    <select name="school_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option selected disabled>Choose...</option>
                        @foreach ($schools as $school)
                            <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>
                                {{ $school->name }}</option>
                        @endforeach
                    </select>
                    @error('school_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col w-full md:w-1/3  px-2 mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Duration</label>
                    <select name="duration"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option selected disabled>Choose...</option>
                        <option value="30">30 mins</option>
                        <option value="45">45 mins</option>
                        <option value="60">60 mins</option>
                        <option value="90">90 mins</option>
                    </select>
                    @error('duration')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col w-full md:w-1/3  px-2 mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject teacher</label>
                    <select name="teacher_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option selected disabled>Choose...</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('teacher_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row flex flex-wrap -mx-2">
                <div class="col w-full px-2">
                    <button type="submit"
                        onclick="this.disabled=true; this.form.submit(); this.innerText='Registering...';"
                        class="px-6 py-2 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700 transition-colors">
                        Register Subject
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Subject Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
        @foreach ($subjectsByClass as $subjects)
            <div
                class="bg-white w-full  dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
                <div class="px-6 py-2 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                        {{ strtoupper($subjects->first()->class->name) }}</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-900/50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    S/N</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Subject</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Duration</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($subjects as $subject)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">1</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $subject->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        {{ $subject->duration }} mins
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button
                                            class="px-3 py-1 bg-primary-600 text-white rounded text-sm hover:bg-primary-700">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection
