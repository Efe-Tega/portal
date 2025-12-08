@extends('layouts.app')
@section('title', 'Teacher Management')
@section('header', 'Teacher Management')
@section('admin-content')
    <!-- Breadcrumb -->
    <div class="mb-6">
        <nav class="flex text-sm text-gray-500 dark:text-gray-400">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600">Dashboard</a>
            <span class="mx-2">/</span>
            <span>Teachers</span>
            <span class="mx-2">/</span>
            <span class="text-gray-900 dark:text-white">All Teachers</span>
        </nav>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Teachers</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">78</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Full-Time</p>
            <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">65</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Part-Time</p>
            <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2">13</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">TRCN Certified</p>
            <p class="text-3xl font-bold text-purple-600 dark:text-purple-400 mt-2">72</p>
        </div>
    </div>

    <!-- Teachers Table -->
    <x-data-table url="{{ route('admin.teachers.all_teachers') }}" title="All Teachers" :columns="['S/N', 'Name', 'Subject', 'Classes', 'Qualification', 'Status']" :item="$teachers"
        searchable="true">
        <x-slot name="buttons">
            <button
                class="px-4 py-2 bg-primary-600 text-white rounded-lg text-sm font-medium hover:bg-primary-700 flex items-center justify-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Teacher
            </button>
        </x-slot>

        <!-- Table Body -->
        @foreach ($teachers as $index => $teacher)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-mono">
                    {{ ($teachers->currentPage() - 1) * $teachers->perPage() + ($index + 1) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $teacher->name }}</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ $teacher->email }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">English Language</td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"
                    data-assigned-ids="{{ $teacher->classes->pluck('id')->join(',') }}"
                    data-assigned-names="{{ $teacher->classes->pluck('name')->join(', ') }}">

                    <div class="flex flex-col gap-1">
                        @if ($teacher->classes->isEmpty())
                            <span class="text-xs text-gray-500">None</span>
                        @else
                            @foreach ($teacher->classes as $c)
                                <div
                                    class="inline-flex items-center justify-between border bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-200 rounded-md px-2 gap-2">
                                    <span class="text-sm">{{ $c->name }}</span>

                                    <form
                                        action="{{ route('admin.unassign.class', ['teacher' => $teacher->id, 'class' => $c->id]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Unassign {{ addslashes($c->name) }} from {{ addslashes($teacher->name) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs px-1 py-0.5 rounded-md hover:text-red-500">
                                            &times;
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </td>


                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">B.Ed., PGDE</td>
                <td class="px-6 py-4 whitespace-nowrap"><span
                        class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">Active</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <div class="relative inline-block text-left">
                        <button type="button"
                            class="manage-btn inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            Manage
                            <x-icons.arrow-down />
                        </button>
                        <div
                            class="manage-dropdown hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 z-10">
                            <div class="py-1" role="menu">
                                <button
                                    class="view-btn block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                                    role="menuitem">View</button>
                                <button
                                    class="edit-btn block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                                    role="menuitem">Edit</button>
                                <button
                                    class="assign-btn block w-full text-left px-4 py-2 text-sm text-emerald-600 dark:text-emerald-400 hover:bg-gray-100 dark:hover:bg-gray-700 font-medium"
                                    data-open-modal data-teacher-id="{{ $teacher->id }}" data-name="{{ $teacher->name }}"
                                    role="menuitem" data-available='@json($unassigned[$teacher->id])'>
                                    Assign Class
                                </button>
                                <button
                                    class="edit-btn block w-full text-left px-4 py-2 text-sm text-red-700 dark:text-red-300 hover:bg-red-100 dark:hover:bg-red-700"
                                    role="menuitem">Delete</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-data-table>

    <!-- Assign Class Modal -->
    <div id="assignClassModal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <div class="absolute inset-0 bg-black/40" data-close-modal></div>

        <div class="relative mx-auto mt-24 w-full max-w-md rounded-xl bg-white p-6 shadow-xl dark:bg-gray-800">
            <div class="flex items-center justify-between border-b border-gray-200 pb-3 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Assign Class
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 dark:text-gray-500" data-close-modal>
                    &times;
                </button>
            </div>

            <form method="POST" action="{{ route('admin.assign.classes') }}" class="space-y-4 pt-4">
                @csrf
                <input type="hidden" name="teacher_id" value="">

                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-300 -mt-4">Teacher:</p>
                    <p id="assignTeacherName" class="font-semibold text-gray-900 dark:text-white">Mr Jonathan</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Available Classes
                    </label>
                    <select name="class_id" id="assignClassSelect"
                        class="w-full rounded-lg border px-3 py-2 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="">Select class</option>
                        <!-- Loop through your classes -->
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-xs text-gray-500">Only unassigned classes appears here.</p>
                </div>

                <div class="text-xs text-gray-500 dark:text-gray-400">
                    Already assigned:
                    <span class="font-medium text-gray-700 dark:text-gray-200" id="assignCurrentClasses">
                        None
                    </span>
                </div>

                <div class="flex justify-end gap-2 border-t border-gray-200 pt-4 dark:border-gray-700">
                    <button type="button" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-900 dark:text-gray-300"
                        data-close-modal>
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white hover:bg-primary-700">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('assignClassModal');
            if (!modal) return;

            const openButtons = document.querySelectorAll('[data-open-modal]');
            const closeButtons = modal.querySelectorAll('[data-close-modal], .absolute.inset-0');

            const teacherNameField = document.getElementById('assignTeacherName');
            const teacherIdField = document.querySelector('input[name="teacher_id"]');
            const classSelect = document.getElementById('assignClassSelect');
            const currentClassesSpan = document.getElementById('assignCurrentClasses');

            function openModal() {
                modal.classList.remove('hidden');
                modal.classList.add('flex'); // optional if you want flex centering
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');

                classSelect.innerHTML = '<option value="">Select class</option>';
                teacherNameField.textContent = '-';
                teacherIdField.value = '';
                currentClassesSpan.textContent = 'None';
            }

            openButtons.forEach(btn => {
                btn.addEventListener('click', () => {

                    const teacherId = btn.dataset.teacherId;
                    const teacherName = btn.dataset.name;
                    const availableJson = btn.dataset.available || '[]';

                    let available = [];
                    try {
                        available = JSON.parse(availableJson);
                    } catch (e) {
                        available = [];
                    }


                    // Fill modal fields
                    teacherNameField.textContent = teacherName || 'Unknown';
                    teacherIdField.value = teacherId || '';

                    classSelect.innerHTML = '<option value="">Select class</option>';
                    available.forEach(c => {
                        const opt = document.createElement('option');
                        opt.value = c.id;
                        opt.textContent = c.name;
                        classSelect.appendChild(opt);
                    });

                    const row = btn.closest('tr');

                    // const assignedNames = row ? row.getAttribute('data-assigned-names') : null;
                    // console.log(assignedNames);
                    // currentClassesSpan.textContent = (assignedNames && assignedNames.trim()) ?
                    //     assignedNames : 'None';

                    let assignedNames = null;
                    if (row) {
                        const assignedId = row.querySelector('[data-assigned-names]');
                        if (assignedId) {
                            assignedNames = assignedId.dataset.assignedNames;
                            if ((assignedNames === undefined || assignedNames === null) &&
                                assignedId.hasAttribute('data-assigned-names')) {
                                assignedNames = assignedId.getAttribute('data-assigned-names');
                            }
                        }
                    }

                    currentClassesSpan.textContent = (assignedNames && assignedNames.trim()) ?
                        assignedNames : 'None';

                    openModal();
                });
            });

            closeButtons.forEach(btn => {
                btn.addEventListener('click', (event) => {
                    event.preventDefault();
                    closeModal();
                });
            });
        });
    </script>
@endsection

@push('scripts')
    <script>
        // ------- Dropdown Management Logic -------
        document.querySelectorAll('.manage-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const dropdown = btn.nextElementSibling;
                const isHidden = dropdown.classList.contains('hidden');

                // Close all other dropdowns
                document.querySelectorAll('.manage-dropdown').forEach(d => {
                    if (d !== dropdown) {
                        d.classList.add('hidden');
                    }
                });

                // Toggle current dropdown
                if (isHidden) {
                    dropdown.classList.remove('hidden');
                } else {
                    dropdown.classList.add('hidden');
                }
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.relative.inline-block')) {
                document.querySelectorAll('.manage-dropdown').forEach(d => {
                    d.classList.add('hidden');
                });
            }
        });

        // Close dropdown when clicking on a menu item
        document.querySelectorAll('.manage-dropdown button').forEach(btn => {
            btn.addEventListener('click', () => {
                const dropdown = btn.closest('.manage-dropdown');
                if (dropdown) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>
@endpush
