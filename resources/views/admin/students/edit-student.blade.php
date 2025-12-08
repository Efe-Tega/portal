@extends('layouts.app')
@section('header', 'Edit Student Information')
@section('admin-content')
    <!-- Breadcrumb -->
    <div class="mb-6">
        <nav class="flex text-sm text-gray-500 dark:text-gray-400">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600">Dashboard</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.students.all_students') }}" class="hover:text-primary-600">Students</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 dark:text-white">Add New Student</span>
        </nav>
    </div>

    <form class="w-full" action="{{ route('admin.update.student') }}" method="POST">
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
        @endif


        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <span class="text-red-500 text-sm">Fields marked with * are required</span>

            <input type="hidden" name="id" value="{{ $studentData->id }}">

            <!-- Personal Information -->
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Personal Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field label="First Name" name="firstname" type="text" required="true"
                    value="{{ $studentData->firstname }}" placeholder="Enter student first name" />

                <x-form-field label="Surname" name="lastname" type="text" required="true"
                    value="{{ $studentData->lastname }}" placeholder="Enter student surname" />

                <x-form-field label="Middle Name" name="middlename" type="text" value="{{ $studentData->middlename }}"
                    placeholder="Enter student middle name" />

                <x-form-field label="Date of Birth" name="dob" type="date" required="true"
                    value="{{ $studentData->student->dob ?? '' }}" />

                <x-form-field label="Gender" name="gender" value="{{ $studentData->student->gender ?? '' }}" type="select"
                    required="true" placeholder="Select Gender" :options="['Male', 'Female']" />


                <x-form-field label="Country" id="country" name="country" type="select" required="true"
                    placeholder="Select Country" value="{{ $studentData->student->country_id }}" :options="$countries->pluck('name', 'id')" />

                <x-form-field label="State of Origin" id="state" name="state" type="select" required="true"
                    placeholder="Select state" value="{{ $studentData->student->state_id }}" :options="$states->pluck('name', 'id')" />

                @if ($studentData->student->local_government_id !== null && $studentData->student->country_id == 160)
                    <!-- LGA SELECT (Nigeria Only) -->
                    <div id="lga-select-wrapper">
                        <x-form-field label="LGA" id="local_government" name="local_government" type="select"
                            placeholder="Select Local Govt Area" value="{{ $studentData->student->local_government_id }}"
                            :options="$lga->pluck('name', 'id')" />
                    </div>
                @endif

                @if ($studentData->student->country_id !== 160)
                    <div id="lga-input-wrapper">
                        <x-form-field label="LGA" id="local_government_text" name="local_government_text" type="text"
                            placeholder="Enter your local area"
                            value="{{ $studentData->student->local_government_text }}" />
                    </div>
                @endif


                <x-form-field label="Religion" name="religion" type="select" placeholder="Select religion"
                    value="{{ $studentData->student->religion }}" :options="['Christianity', 'Islam', 'Traditional', 'Other']" />
            </div>
        </div>

        <!-- Academic Information -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Academic Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <x-form-field label="Class" id="studentClass" name="class_id" type="select" required="true"
                    placeholder="select class" value="{{ $studentData->class_id }}" :options="$classes->pluck('name', 'id')" />

                <x-form-field label="Admission Date" name="admission_date" type="date" required="true"
                    value="{{ $studentData->student->admission_date }}" />

                <x-form-field label="Previous School" id="prev_school" name="previous_school"
                    placeholder="Enter previous school attended" value="{{ $studentData->student->previous_school }}" />

                <x-form-field label="Education Level" name="school_id" type="select" required="true"
                    placeholder="select education level" value="{{ $studentData->school_id }}" :options="$schools->pluck('name', 'id')" />
            </div>
        </div>

        <!-- Guardian Information -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Guardian Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field label="Guardian Name" name="guardian_name" required="true"
                    placeholder="Enter guardian name" value="{{ $studentData->student->guardian_name }}" />

                <x-form-field type="select" name="guardian_relationship" label="Relationship" required="true"
                    placeholder="Select relationship with guardian"
                    value="{{ $studentData->student->guardian_relationship }}" :options="['Father', 'Mother', 'Guardian', 'Uncle', 'Aunt', 'Other']" />

                <x-form-field type="text" name="guardian_phone" label="Phone Number" required="true"
                    placeholder="Enter guardian phone number" value="{{ $studentData->student->guardian_phone }}" />

                <x-form-field type="email" name="guardian_email" label="Email"
                    value="{{ $studentData->student->guardian_email }}" placeholder="Enter email address" />
                <x-form-field label="Address" name="address" type="textarea" placeholder="Enter house address"
                    required="true" value="{{ $studentData->student->address }}" />
            </div>
        </div>

        <div class="flex space-x-4">
            <button type="submit"
                class="px-6 py-3 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700"> Update Student
            </button>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const country = document.getElementById("country");
            const state = document.getElementById('state');
            const classSelect = document.getElementById('class_id');
            const schoolSelect = document.getElementById('school_id');

            schoolSelect.disabled = true;

            // When country changes
            country.addEventListener("change", function() {
                const countryId = parseInt(this.value);

                if (!countryId) return;

                // load states
                fetch(`/get-states/${countryId}`)
                    .then(res => res.json())
                    .then(states => {
                        states.forEach(item => {
                            state.innerHTML +=
                                `<option value="${item.id}">${item.name}</option>`;
                        });
                        state.disabled = false;

                    });
            });

            classSelect.addEventListener('change', function() {
                const classId = this.value;

                if (!classId) return;

                fetch(`/admin/class/${classId}/school`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.school_id) {
                            schoolSelect.value = data.school_id;
                            schoolSelect.disabled = false;
                        } else {
                            schoolSelect.value = "";
                        }
                    })
                    .catch(err => console.error("AJAX error:", err));
            });
        });
    </script>
@endsection
