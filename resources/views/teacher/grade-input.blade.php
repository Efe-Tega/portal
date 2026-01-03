@extends('layouts.app')
@section('title', 'Student Grades')
@section('header', 'Student Grades')
@section('teacher-content')
    <!-- Page Header -->
    <x-page-header>
        <x-slot:title>Grade Input</x-slot:title>
        <x-slot:subtitle>Enter student scores and grades for assessments</x-slot:subtitle>
    </x-page-header>

    <!-- Selection Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
        <form id="excelImportForm" action="{{ route('teacher.import.scores') }}" method="post" enctype="multipart/form-data">
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
            @elseif (session('error'))
                <div class="flex items-center justify-between bg-red-600 text-white dark:bg-red-600 text-sm font-medium px-4 py-3 rounded-lg shadow-md mb-4"
                    role="alert">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="text-white hover:text-emerald-200 focus:outline-none"
                        onclick="this.parentElement.remove();" aria-label="Close">
                        ✕
                    </button>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select Class</label>
                    <select id="class_id" name="class_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option selected disabled>Select Class</option>
                        @foreach ($classes as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject</label>
                    <select id="subject_id" name="subject_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option selected disabled>Select Subject</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Assessment Type</label>
                    <select id="exam_id" name="exam_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        @foreach ($examType as $assessment)
                            <option value="{{ $assessment->id }}">
                                {{ $assessment->name }} ({{ $assessment->total_marks }} marks)
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select Term</label>
                    <select id="term_id" name="term_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        @foreach ($terms as $term)
                            <option value="{{ $term->id }}">{{ $term->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select Year</label>
                    <select id="year_id" name="year_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Excel Import Section -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-4 mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Import from Excel</label>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">Upload an Excel file (.xlsx, .xls) to import
                    student scores </p>
                <div class="flex items-end space-x-3">
                    <div class="flex-1">
                        <input type="file" id="excelFileInput" name="excelFile" accept=".xlsx,.xls" required
                            class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 dark:file:bg-green-900/20 dark:file:text-green-400">
                    </div>
                    <button type="submit" id="importExcelBtn"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        <span>Import Excel</span>
                    </button>
                </div>
                <div id="importStatus" class="mt-2 text-sm hidden"></div>
            </div>
        </form>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h3 id="scoreTitle" class="text-lg font-bold text-gray-900 dark:text-white">
            </h3>
            {{-- <button id="calculateGrades"
                class="px-4 py-2 bg-purple-600 text-white rounded-lg text-sm font-medium hover:bg-purple-700">Calculate
                Grades</button> --}}
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
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Score
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700" id="scoreTableBody">
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <td colspan="6"
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white text-center">No
                            students found</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="paginationWrapper"></div>

        <div class="p-6 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <div class="text-sm text-gray-700 dark:text-gray-300">
                    <span class="font-semibold">Class Average:</span> <span id="classAverage"
                        class="text-primary-600 dark:text-primary-400">-</span>
                </div>
                <div class="text-sm text-gray-700 dark:text-gray-300">
                    <span class="font-semibold">Highest Score:</span> <span id="highestScore"
                        class="text-green-600 dark:text-green-400">-</span>
                </div>
                <div class="text-sm text-gray-700 dark:text-gray-300">
                    <span class="font-semibold">Lowest Score:</span> <span id="lowestScore"
                        class="text-red-600 dark:text-red-400">-</span>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.getElementById('class_id').addEventListener('change', function() {
            let classId = this.value;
            let subjectSelect = document.getElementById('subject_id');

            subjectSelect.innerHTML = '<option value="">Loading...</option>';

            if (!classId) {
                subjectSelect.innerHTML = '<option value="">Select Subject</option>';
                return
            }

            fetch(`/teacher/get_subjects/${classId}`)
                .then(response => response.json())
                .then(data => {
                    subjectSelect.innerHTML = '<option value="">Select Subject</option>';

                    data.forEach(subject => {
                        subjectSelect.innerHTML +=
                            `<option value="${subject.id}">${subject.name}</option>`;
                    });
                })
                .catch(() => {
                    subjectSelect.innerHTML = '<option value="">Error loading subjects</option>';
                });
        })
    </script>

    <script>
        function updateTitle() {
            const classText = getSelectedText('class_id');
            const subjectText = getSelectedText('subject_id');
            const examText = getSelectedText('exam_id');
            const yearText = getSelectedText('year_id');
            const termText = getSelectedText('term_id');

            const titleEl = document.getElementById('scoreTitle');

            let parts = [];
            if (classText) parts.push(classText);
            if (subjectText) parts.push(subjectText);
            if (examText) parts.push(`${examText}`);
            if (yearText) parts.push(`${yearText}`);
            if (termText) parts.push(`${termText}`);

            titleEl.textContent = parts.length ? parts.join(' - ') : 'Select filters to view scores';
        }

        function getSelectedText(id) {
            const el = document.getElementById(id);
            return el?.options[el.selectedIndex]?.text?.trim() || '';
        }
    </script>

    <script>
        const filters = [
            'class_id',
            'term_id',
            'exam_id',
            'subject_id',
            'year_id'
        ];

        let currentPage = 1;

        filters.forEach(id => {
            document.getElementById(id).addEventListener('change', () => {
                updateTitle();
                currentPage = 1;
                fetchScores();
            });
        });

        function updateStatistics(students) {
            const scores = students
                .map(s => Number(s.score))
                .filter(s => !isNaN(s));

            const classAvg = document.getElementById('classAverage');
            const highScore = document.getElementById('highestScore');
            const lowScore = document.getElementById('lowestScore');

            if (!classAvg || !highScore || !lowScore) return;

            if (scores.length === 0) {
                classAvg.textContent = '-';
                highScore.textContent = '-';
                lowScore.textContent = '-';
                return;
            }

            const total = scores.reduce((sum, s) => sum + s, 0);
            const average = (total / scores.length).toFixed(2);
            const highest = Math.max(...scores);
            const lowest = Math.min(...scores);

            classAvg.textContent = average;
            highScore.textContent = highest;
            lowScore.textContent = lowest;
        }

        function fetchScores(page = currentPage) {
            let data = {};
            let valid = true;

            filters.forEach(id => {
                const value = document.getElementById(id).value;
                if (!value) valid = false;
                data[id] = value;
            });

            if (!valid) return;

            data.page = page;

            fetch(`{{ route('teacher.scores.preview') }}?` + new URLSearchParams(data))
                .then(res => res.json())
                .then(response => {
                    console.log('PREVIEW RESPONSE:', response);
                    const tbody = document.getElementById('scoreTableBody');
                    tbody.innerHTML = '';

                    if (!response.students || response.students.length === 0) {
                        tbody.innerHTML = `
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">No students found</td>
                    </tr>`;
                        renderPagination(null);
                        return;
                    }

                    response.students.forEach((row, index) => {
                        tbody.innerHTML += `
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">${(page -1) * response.students.length + index + 1}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            ${row.name}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">${row.reg_no}</td>
                        <td class="px-6 py-4 text-center">
                            <input type="number" placeholder="0" value="${row.score ?? ''}" disabled
                                class="score-input w-20 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded text-center bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        </td>
                    </tr>
                    `;
                    });
                    if (typeof renderPagination === 'function') {
                        renderPagination(response);
                    }
                    // renderPagination(response);
                    if (typeof updateStatistics === 'function') {
                        updateStatistics(response.students);
                    }
                })
                .catch(err => {
                    console.error('FETCH ERROR:', err);
                    alert('Failed to load scores');
                });
        }

        function renderPagination(response) {
            const wrapper = document.getElementById('paginationWrapper');
            if (!wrapper) return;

            wrapper.innerHTML = '';

            if (!response || response.total === 0) return;

            const perPage = response.students.length;
            const currentPage = response.current_page;
            const lastPage = response.last_page;
            const total = response.total;

            const from = (currentPage - 1) * perPage + 1;
            const to = Math.min(from + perPage - 1, total);

            let buttons = '';

            buttons += `
        <button
            ${currentPage === 1 ? 'disabled' : ''}
            onclick="fetchScores(${currentPage - 1})"
            class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded text-sm
                ${currentPage === 1
                    ? 'text-gray-400 cursor-not-allowed'
                    : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'}">
            Previous
        </button>
    `;

            for (let i = 1; i <= lastPage; i++) {
                buttons += `
                <button
                    onclick="fetchScores(${i})"
                    class="px-3 py-1 bg-primary-600 text-white rounded text-sm
                        ${i === currentPage
                            ? 'bg-purple-600 text-white'
                            : 'bg-gray-200 dark:bg-gray-700 hover:bg-gray-300'}">
                    ${i}
                </button>
                `;
            }

            // Next
            buttons += `
        <button
            ${currentPage === lastPage ? 'disabled' : ''}
            onclick="fetchScores(${currentPage + 1})"
            class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded text-sm
                ${currentPage === lastPage
                    ? 'text-gray-400 cursor-not-allowed'
                    : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'}">
            Next
        </button>
    `;

            wrapper.innerHTML = `
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <div class="text-sm text-gray-700 dark:text-gray-300">
                Showing <span class="font-medium">${from}</span>
                to <span class="font-medium">${to}</span>
                of <span class="font-medium">${total}</span> results
            </div>

            <div class="flex space-x-2">
                ${buttons}
            </div>
        </div>
    `;
        }
    </script>


    {{-- <script>
        document.getElementById('calculateGrades').addEventListener('click', function() {
            let data = {}
            let valid = true;

            filters.forEach(id => {
                const el = document.getElementById(id);
                if (!el || !el.value) valid = false;
                data[id] = el.value;
            });

            if (!valid) {
                alert('Please select all filters before calculating grades');
                return;
            }

            fetch(`{{ route('teacher.calculate.grades') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                })
                .then(res => res.json())
                .then(response => {
                    alert(response.message);
                    fetchScores();
                })
                .catch(() => {
                    alert('Failed to calculate grades');
                });
        })
    </script> --}}
@endpush
