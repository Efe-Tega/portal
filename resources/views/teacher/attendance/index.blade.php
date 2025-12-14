@extends('layouts.app')
@section('title', 'Attendance')
@section('header', 'Attendance')
@section('teacher-content')
    <!-- Page Header -->
    <x-page-header>
        <x-slot:title>Mark Attendance</x-slot:title>
        <x-slot:subtitle>Record student attendance for today's classes</x-slot:subtitle>
    </x-page-header>

    <!-- Selection Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
        <form id="attendanceFilterForm" action="{{ route('teacher.attendance') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select Class</label>
                    <select id="classSelect" name="class_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        @foreach ($classes as $c)
                            <option value="{{ $c->id }}" {{ $selectedClassId == $c->id ? 'selected' : '' }}>
                                {{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select Date</label>
                    <input type="date" id="dateSelect" value="{{ $attendanceDate }}" name="attendance_date"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                </div>

            </div>
        </form>
    </div>

    <!-- Quick Actions -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex space-x-2">
            <button id="markAllPresent"
                class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700">Mark All
                Present</button>
            <button id="markAllAbsent"
                class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700">Mark All
                Absent</button>
        </div>
        <div class="text-sm text-gray-600 dark:text-gray-400">
            <span class="font-semibold text-green-600 dark:text-green-400" id="presentCount">0</span> Present •
            <span class="font-semibold text-red-600 dark:text-red-400" id="absentCount">0</span> Absent •
            <span class="font-semibold text-yellow-600 dark:text-yellow-400" id="lateCount">0</span> Late
        </div>
    </div>

    <!-- Attendance Table -->
    <x-data-table title="SS2 Student" :columns="['S/N', 'Student Name', 'Class', 'Admission No', 'Present', 'Absent', 'Late', 'Remarks']" :actions="false" :item="$students">
        @foreach ($students as $key => $student)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50" data-student="{{ $student->id }}"
                data-class="{{ $student->class_id }}">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                    {{ ($students->currentPage() - 1) * $students->perPage() + ($key + 1) }}</td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                    {{ fullname($student->firstname, $student->middlename, $student->firstname) }}</td>

                <td data-student="{{ $student->id }}" data-class="{{ $student->class->id }}"
                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                    {{ $student->class->name }}</td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                    {{ $student->registration_number }}</td>
                <td class="px-6 py-4 text-center">
                    <input type="radio" name="attendance_{{ $student->id }}" value="present"
                        data-student="{{ $student->id }}" class="w-4 h-4 text-primary-600 focus:ring-primary-500">
                </td>
                <td class="px-6 py-4 text-center">
                    <input type="radio" name="attendance_{{ $student->id }}" value="absent"
                        data-student="{{ $student->id }}" class="w-4 h-4 text-primary-600 focus:ring-primary-500">
                </td>
                <td class="px-6 py-4 text-center">
                    <input type="radio" name="attendance_{{ $student->id }}" value="late"
                        data-student="{{ $student->id }}" class="w-4 h-4 text-primary-600 focus:ring-primary-500">
                </td>
                <td class="px-6 py-4">
                    <input type="text" placeholder="Optional remarks" name="remark"
                        class="w-full px-3 py-1 border border-gray-300 dark:border-gray-600 rounded text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                </td>
            </tr>
        @endforeach

    </x-data-table>
@endsection

@push('scripts')
    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "3000",
            preventDuplicates: true,
        };
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const dateInput = document.getElementById('dateSelect');
            const classSelect = document.getElementById('classSelect');
            const filterForm = document.getElementById('attendanceFilterForm');

            function autoSubmitFilter() {
                if (!dateInput || !dateInput.value) return;
                filterForm.submit();
            }

            classSelect.addEventListener('change', autoSubmitFilter);
            dateInput.addEventListener('change', autoSubmitFilter);

            function getRowData(input) {
                const row = input.closest('tr');
                return {
                    row,
                    studentId: input.dataset.student,
                    classId: row.dataset.class,
                    remark: row.querySelector('input[name="remark"]')?.value || ''
                }
            }

            function sendAttendance(studentId, status, classId, remark = '') {
                fetch("{{ route('teacher.attendance.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            student_id: studentId,
                            status: status,
                            class_id: classId,
                            remark: remark,
                            attendance_date: dateInput.value,
                        })
                    })
                    .then(res => {
                        if (!res.ok) throw new Error();
                        return res.json();
                    })
                    .then(() => {
                        toastr.success('Attendance saved', null, {
                            timeOut: 1500
                        });
                    })
                    .then(() => {
                        fetchAttendanceCounts();
                    })
                    .catch(() => {
                        toastr.error('Fail to save attendance');
                    })
            }

            // Listen for changes on radios
            document.querySelectorAll('input[type="radio"][data-student]').forEach(input => {
                input.addEventListener('change', function() {
                    const studentId = this.dataset.student;
                    const status = this.value;

                    const row = this.closest('tr');
                    const classId = row.dataset.class;
                    const remarkInput = row.querySelector('input[name="remark"]');
                    const remark = remarkInput ? remarkInput.value : '';

                    sendAttendance(studentId, status, classId, remark);
                });
            })

            function markAll(status) {
                if (!dateInput.value || !classSelect.value) {
                    toastr.warning('Please select class and date');
                    return;
                };

                fetch("{{ route('teacher.attendance.markAll') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },

                        body: JSON.stringify({
                            class_id: classSelect.value,
                            attendance_date: dateInput.value,
                            status: status,
                        })
                    })
                    .then(res => {
                        if (!res.ok) throw new Error('Request failed');
                        return res.json();
                    })
                    .then(data => {
                        document.querySelectorAll(`input[value="${status}"]`).forEach(r => {
                            r.checked = true;
                        });

                        toastr.success(
                            status === 'present' ? 'All Students marked present' :
                            'All students marked absent'
                        );
                    })
                    .then(() => {
                        fetchAttendanceCounts();
                    })
                    .catch(() => {
                        toastr.error('Failed to mark attendance. Try again');
                    });

                document.querySelectorAll('input[value="' + status + '"]').forEach(input => {
                    input.checked = true;

                    const {
                        studentId,
                        classId,
                        remark
                    } = getRowData(input);
                    sendAttendance(studentId, status, classId, remark);
                })
            }

            document.getElementById('markAllPresent')?.addEventListener('click', () => {
                markAll('present');
            });

            document.getElementById('markAllAbsent')?.addEventListener('click', () => {
                markAll('absent');
            })


            // List for blur on remark inputs to save when teacher leaves the field
            document.querySelectorAll('input[name="remark"]').forEach(input => {
                input.addEventListener('blur', function() {
                    const row = this.closest('tr');
                    const studentId = row.querySelector('input[type="radio"][data-student]').dataset
                        .student;
                    const classId = row.dataset.class;

                    // Get currently selected status
                    const selectedRadio = row.querySelector(
                        'input[type="radio"][data-student]:checked');

                    if (!selectedRadio) return;
                    const remark = this.value.trim();

                    sendAttendance(studentId, selectedRadio.value, classId, this.value);

                });
            });

            // Fetch existing attendance for the selected class/date
            function fetchAttendance() {
                fetch(
                        `{{ route('teacher.attendance.fetch') }}?class_id=${classSelect.value}&attendance_date=${dateInput.value}`
                    )
                    .then(res => res.json())
                    .then(data => {
                        // Set radios and remarks
                        for (const studentId in data.attendance) {
                            const status = data.attendance[studentId];
                            const radio = document.querySelector(
                                `input[data-student="${studentId}"][value="${status}"]`);

                            if (!radio) continue;
                            radio.checked = true;

                            // Set remark if it exist
                            const row = radio.closest('tr');
                            if (!row) continue;

                            const remarkInput = row.querySelector('input[name="remark"]');
                            if (remarkInput && data.remarks?.[studentId]) {
                                remarkInput.value = data.remarks[studentId];
                            }
                        }
                    })
                    .catch(err => console.error('Error fetching attendance:', err));
            }

            function fetchAttendanceCounts() {
                if (!classSelect.value || !dateInput.value) return;

                fetch(
                        `{{ route('teacher.attendance.counts') }}?class_id=${classSelect.value}&attendance_date=${dateInput.value}`
                    )
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('presentCount').textContent = data.present ?? 0;
                        document.getElementById('absentCount').textContent = data.absent ?? 0;
                        document.getElementById('lateCount').textContent = data.late ?? 0;
                    })
                    .catch(() => {
                        console.error('Failed to fetch attendance counts');
                    })
            }

            // initials
            fetchAttendance();
            fetchAttendanceCounts();
        })
    </script>
@endpush
