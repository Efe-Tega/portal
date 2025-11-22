@extends('admin.admin-main')
@section('header', 'All Students')

@section('admin-content')
    <!-- Breadcrumb -->
    <div class="mb-6">
        <nav class="flex text-sm text-gray-500 dark:text-gray-400">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600">Dashboard</a>
            <span class="mx-2">/</span>
            <span>Students</span>
            <span class="mx-2">/</span>
            <span class="text-gray-900 dark:text-white">All Students</span>
        </nav>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Students</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalStudents }}</p>
                </div>
                <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Active Students</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $activeStudents }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">New This Term</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">42</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Graduated</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">58</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Error Message --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div
        class="mb-5 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden md:w-1/2">
        <div class="py-4 px-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Find Student</h3>

            <form method="GET" action="{{ route('admin.students.all_students') }}" class="flex w-full space-x-3">

                <select name="class_id"
                    class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">-- Select a class --</option>

                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ $selectedClassId == $class->id ? 'selected' : '' }}>
                            {{ $class->name }}</option>
                    @endforeach
                </select>

                <button type="submit"
                    class="flex-1 px-4 py-2 bg-primary-600 text-white rounded-lg text-sm font-medium hover:bg-primary-700 flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                            d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Find Students
                </button>

            </form>
        </div>
    </div>

    <!-- Students Table -->
    <x-data-table title="All Students" :columns="['S/N', 'Student', 'Student ID', 'Class', 'Gender', 'Status']" :item="$students" searchable="true" :filters="[['label' => 'Class', 'options' => ['All Classes', 'JSS1', 'JSS2', 'JSS3', 'SS1', 'SS2', 'SS3']]]">
        <x-slot name="buttons">
            <button id="importStudentBtn"
                class="px-4 py-2 bg-primary-600 text-white rounded-lg text-sm font-medium hover:bg-primary-700 flex items-center justify-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                    </path>
                </svg>
                Import Students
            </button>
        </x-slot>


        <!-- Table Body -->
        @foreach ($students as $index => $student)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-mono">
                    {{ ($students->currentPage() - 1) * $students->perPage() + ($index + 1) }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div>
                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $student->lastname }}
                                {{ $student->middlename }} {{ $student->firstname }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $student->email ?? '' }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-mono">{{ $student->registration_number }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $student->class->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $student->gender ?? '' }}</td>
                <td class="px-6 py-4">
                    <span
                        class="px-3 py-1 text-xs font-medium text-green-700 dark:text-green-400 bg-green-100 dark:bg-green-900/30 rounded-full">Active</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.student.profile', [$student->id, strtolower($student->lastname . '_' . $student->firstname)]) }}"
                            class="p-2 text-primary-600 dark:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-lg transition-colors"
                            title="View Profile">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ route('admin.edit.student', [$student->id, $student->lastname . '_' . $student->firstname]) }}"
                            class="p-2 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors"
                            title="Edit">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ route('admin.delete.student', $student->id) }}" id="delete"
                            class="p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors"
                            title="Delete">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach

    </x-data-table>

    <!-- Import Students Modal -->
    <div id="importModal"
        class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Import Students</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Upload an Excel file to bulk import
                        student
                        records</p>
                </div>
                <button id="closeModal" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('admin.import.students') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Modal Content -->
                <div class="p-6">
                    <!-- File Upload Area -->
                    <input type="file" name="file" id="">
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end space-x-3 p-6 border-t border-gray-200 dark:border-gray-700">
                    <button
                        class="px-6 py-2.5 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                        type="submit">
                        Upload & Import
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('system_assets/assets/js/code.js') }}"></script>
    <script>
        // Import Modal
        const importModal = document.getElementById('importModal');
        const importStudentBtn = document.getElementById('importStudentBtn');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileInput');
        const browseBtn = document.getElementById('browseBtn');
        const uploadPrompt = document.getElementById('uploadPrompt');
        const fileSelected = document.getElementById('fileSelected');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        const removeFile = document.getElementById('removeFile');
        const uploadBtn = document.getElementById('uploadBtn');
        const uploadProgress = document.getElementById('uploadProgress');
        const progressBar = document.getElementById('progressBar');
        const progressPercent = document.getElementById('progressPercent');
        const successMessage = document.getElementById('successMessage');
        const successDetails = document.getElementById('successDetails');
        const errorMessage = document.getElementById('errorMessage');
        const errorDetails = document.getElementById('errorDetails');

        let selectedFile = null;

        // Show modal
        importStudentBtn.addEventListener('click', () => {
            importModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        // Close modal
        const closeModalFunc = () => {
            importModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
            resetModal();
        };

        closeModal.addEventListener('click', closeModalFunc);
        cancelBtn.addEventListener('click', closeModalFunc);

        // Close when clicking outside
        importModal.addEventListener('click', (e) => {
            if (e.target === importModal) {
                closeModalFunc();
            }
        });

        // Drag and Drop
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-primary-500', 'bg-primary-50', 'dark:bg-primary-900/20');
        });

        dropZone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-primary-500', 'bg-primary-50', 'dark:bg-primary-900/20');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-primary-500', 'bg-primary-50', 'dark:bg-primary-900/20');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFile(files[0]);
            }
        });

        // Click to browse
        dropZone.addEventListener('click', () => {
            if (!selectedFile) {
                fileInput.click();
            }
        });

        browseBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            fileInput.click();
        });

        // File selected
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handleFile(e.target.files[0]);
            }
        });

        // Handle file
        function handleFile(file) {
            // Validate file type
            const validExtensions = ['.xlsx', '.xls', '.csv'];
            const fileExtension = '.' + file.name.split('.').pop().toLowerCase();

            if (!validExtensions.includes(fileExtension)) {
                showError('Invalid file type. Please upload an Excel (.xlsx, .xls) or CSV (.csv) file.');
                return;
            }

            // Validate file size (10MB max)
            const maxSize = 10 * 1024 * 1024;
            if (file.size > maxSize) {
                showError('File size exceeds 10MB. Please upload a smaller file.');
                return;
            }

            selectedFile = file;

            // Display file info
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);

            // Update UI
            uploadPrompt.classList.add('hidden');
            fileSelected.classList.remove('hidden');
            uploadBtn.disabled = false;
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
        }

        // Remove file
        removeFile.addEventListener('click', (e) => {
            e.stopPropagation();
            selectedFile = null;
            fileInput.value = '';
            uploadPrompt.classList.remove('hidden');
            fileSelected.classList.add('hidden');
            uploadBtn.disabled = true;
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
        });

        // Upload button
        uploadBtn.addEventListener('click', () => {
            if (!selectedFile) return;

            // Hide messages
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');

            // Show progress
            uploadProgress.classList.remove('hidden');
            uploadBtn.disabled = true;

            // Simulate upload progress
            let progress = 0;
            const interval = setInterval(() => {
                progress += 10;
                progressBar.style.width = progress + '%';
                progressPercent.textContent = progress + '%';

                if (progress >= 100) {
                    clearInterval(interval);

                    setTimeout(() => {
                        uploadProgress.classList.add('hidden');

                        // Show success
                        const studentCount = Math.floor(Math.random() * 100) + 50;
                        successDetails.textContent =
                            `${studentCount} students imported successfully.`;
                        successMessage.classList.remove('hidden');

                        // Auto close after 3 seconds
                        setTimeout(() => {
                            closeModalFunc();
                        }, 3000);
                    }, 500);
                }
            }, 200);
        });

        // Helper functions
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        }

        function showError(message) {
            errorDetails.textContent = message;
            errorMessage.classList.remove('hidden');
            uploadProgress.classList.add('hidden');
            uploadBtn.disabled = false;
        }

        function resetModal() {
            selectedFile = null;
            fileInput.value = '';
            uploadPrompt.classList.remove('hidden');
            fileSelected.classList.add('hidden');
            uploadProgress.classList.add('hidden');
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
            uploadBtn.disabled = true;
            progressBar.style.width = '0%';
            progressPercent.textContent = '0%';
        }
    </script>
@endsection
