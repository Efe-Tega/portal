@extends('layouts.app')
@section('title', 'Affective Traits & Sport')
@section('header', 'Affective Traits & Sport')
@section('teacher-content')
    <!-- Page Header -->
    <x-page-header>
        <x-slot:title>Affective Trait & Sport</x-slot:title>
        <x-slot:subtitle>Input student affective traits</x-slot:subtitle>
    </x-page-header>

    <!-- Selection Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Term</label>
                    <select id="termSelect" name="term_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option selected disabled>Select Term</option>
                        @foreach ($terms as $term)
                            <option value="{{ $term->id }}">
                                {{ $term->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Year</label>
                    <select id="yearSelect" name="year_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option value="">Select Year</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}">
                                {{ $year->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select Class</label>
                    <select id="classSelect" name="class_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option selected disabled>Select Class</option>
                        @foreach ($classes as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select Student</label>
                    <select id="studentSelect" name="student_id" disabled
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option value="">Select Student</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div id="traitWrapper" class="mt-4 hidden"></div>

@endsection

@push('scripts')
    <script>
        const yearSelect = document.getElementById('yearSelect');
        const termSelect = document.getElementById('termSelect');
        const classSelect = document.getElementById('classSelect');
        const studentSelect = document.getElementById('studentSelect');
        const traitWrapper = document.getElementById('traitWrapper');


        /* =====================================================
           2️⃣ PURE / UTILITY FUNCTIONS
        ===================================================== */
        function updateSportsSummary() {
            const countEl = document.getElementById('sports-count');
            const percentEl = document.getElementById('sports-percent');

            if (!countEl || !percentEl) return;

            const total = document.querySelectorAll('.sport-checkbox').length;
            const active = document.querySelectorAll('.sport-checkbox:checked').length;

            countEl.textContent = `${active} out of ${total} sports`;
            percentEl.textContent = total ?
                Math.round((active / total) * 100) + '%' :
                '0%';
        }


        /* =====================================================
           3️⃣ DATA LOADERS / FETCH FUNCTIONS
        ===================================================== */
        function loadSports(studentId) {
            fetch(`/teacher/student-sports/${studentId}?term_id=${termSelect.value}&academic_year_id=${yearSelect.value}`)
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                    document.querySelectorAll('.sport-checkbox').forEach(cb => {
                        const sportKey = cb.dataset.sport;
                        cb.checked = Number(data[sportKey]) === 1;
                        updateSportUI(cb);
                    });

                    updateSportsSummary();
                })
                .catch(err => console.error(err));
        }

        function updateSportUI(checkbox) {
            const card = checkbox.closest('div');
            const status = card.querySelector('.sport-status');
            const icon = card.querySelector('.sport-icon path');
            const text = card.querySelector('.sport-text');

            if (!status || !icon || !text) return;

            if (checkbox.checked) {
                text.textContent = 'Participating';

                icon.setAttribute('d', 'M5 13l4 4L19 7');

                status.className =
                    'sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold ' +
                    'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400';
            } else {
                text.textContent = 'Not Participating';
                icon.setAttribute(
                    'd',
                    'M6 18L18 6M6 6l12 12'
                );

                status.className =
                    'sport-status ml-auto inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold ' +
                    'bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400';
            }
        }

        function attachTraitListeners(studentId) {
            document.querySelectorAll('.trait-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                    fetch('/teacher/save-trait-score', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            student_id: studentId,
                            trait_id: this.dataset.trait,
                            score: this.value,
                            term_id: termSelect.value,
                            academic_year_id: yearSelect.value
                        })
                    });
                });
            });
        }


        /* =====================================================
           4️⃣ EVENT LISTENERS (LAST)
        ===================================================== */
        classSelect.addEventListener('change', () => {
            const classId = classSelect.value;

            studentSelect.innerHTML = '<option value="">Loading...</option>';
            studentSelect.disabled = true;
            traitWrapper.classList.add('hidden');

            if (!classId) return;

            fetch(`/class/${classId}/students`)
                .then(res => res.json())
                .then(students => {
                    studentSelect.innerHTML = '<option value="">Select Student</option>';
                    students.forEach(s => {
                        studentSelect.innerHTML += `<option value="${s.id}">${s.name}</option>`;
                    });
                    studentSelect.disabled = false;
                });
        });

        studentSelect.addEventListener('change', () => {
            const studentId = studentSelect.value;
            if (!studentId) return;

            fetch(`/student/${studentId}/traits?term_id=${termSelect.value}&year_id=${yearSelect.value}`)
                .then(res => res.text())
                .then(html => {
                    traitWrapper.innerHTML = html;
                    traitWrapper.classList.remove('hidden');
                    attachTraitListeners(studentId);
                    loadSports(studentId);
                });
        });

        document.addEventListener('change', function(e) {
            if (!e.target.classList.contains('sport-checkbox')) return;

            updateSportUI(e.target);
            console.log('clicked');

            fetch('/teacher/save-sport-participation', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        student_id: studentSelect.value,
                        sport: e.target.dataset.sport,
                        active: e.target.checked ? 1 : 0,
                        term_id: termSelect.value,
                        academic_year_id: yearSelect.value
                    })
                })
                .then(res => res.json())
                .then(() => updateSportsSummary());
        });
    </script>
@endpush
