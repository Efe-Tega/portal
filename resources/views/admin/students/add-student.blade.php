@extends('admin.admin-main')
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

    <form class="w-full" action="{{ route('admin.create.new_student') }}" method="POST">
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

            <!-- Personal Information -->
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Personal Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field label="First Name" name="firstname" type="text" required="true"
                    placeholder="Enter student first name" />

                <x-form-field label="Surname" name="lastname" type="text" required="true"
                    placeholder="Enter student surname" />
                <x-form-field label="Middle Name" name="middlename" type="text"
                    placeholder="Enter student middle name" />

                <x-form-field label="Date of Birth" name="dob" type="date" required="true" />
                <x-form-field label="Gender" name="gender" type="select" required="true" placeholder="Select Gender"
                    :options="['Male', 'Female']" />

                <x-form-field label="Country" id="country" name="country" type="select" required="true"
                    placeholder="Select Country" :options="$countries->pluck('name', 'id')" />

                <x-form-field label="State of Origin" id="state" name="state" type="select" required="true"
                    placeholder="Select state" :options="[]" />

                <!-- LGA SELECT (Nigeria Only) -->
                <div id="lga-select-wrapper" style="display: none">
                    <x-form-field label="LGA" id="local_government" name="local_government" type="select"
                        placeholder="Select Local Govt Area" :options="[]" />
                </div>

                <div id="lga-input-wrapper" style="display: none;">
                    <x-form-field label="LGA" id="local_government_text" name="local_government_text" type="text"
                        placeholder="Enter your local area" />
                </div>


                <x-form-field label="Religion" name="religion" type="select" placeholder="Select religion"
                    :options="['Christianity', 'Islam', 'Traditional', 'Other']" />
            </div>
        </div>

        <!-- Academic Information -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Academic Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <x-form-field label="Class" name="class_id" type="select" required="true" placeholder="select class"
                    :options="$classes->pluck('name', 'id')" />

                <x-form-field label="Admission Date" name="admission_date" type="date" required="true" />
                <x-form-field label="Previous School" name="previous_school" placeholder="Enter previous school attended" />

                <x-form-field label="Education Level" name="school_id" type="select" required="true"
                    placeholder="select education level" :options="$schools->pluck('name', 'id')" />
            </div>
        </div>

        <!-- Guardian Information -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Guardian Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field label="Guardian Name" name="guardian_name" required="true"
                    placeholder="Enter guardian name" />

                <x-form-field type="select" name="guardian_relationship" label="Relationship" required="true"
                    placeholder="Select relationship with guardian" :options="['Father', 'Mother', 'Guardian', 'Uncle', 'Aunt', 'Other']" />

                <x-form-field type="text" name="guardian_phone" label="Phone Number" required="true"
                    placeholder="Enter guardian phone number" />

                <x-form-field type="email" name="guardian_email" label="Email" placeholder="Enter email address" />
                <x-form-field label="Address" name="address" type="textarea" placeholder="Enter house address"
                    required="true" />
            </div>
        </div>

        <div class="flex space-x-4">
            <button type="submit"
                class="px-6 py-3 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700">Add
                Student</button>
            <a href="{{ route('admin.students.all_students') }}"
                class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</a>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const country = document.getElementById("country");
            const state = document.getElementById('state');
            const lga = document.getElementById('local_government');

            const lgaSelectWrapper = document.getElementById('lga-select-wrapper');
            const lgaInputWrapper = document.getElementById('lga-input-wrapper');

            const NIGERIA_ID = {{ $nigeriaId }};

            state.disabled = true;


            // When country changes
            country.addEventListener("change", function() {
                const countryId = parseInt(this.value);

                // Reset all
                state.innerHTML = `<option selected disabled>Select State</option>`;
                lga.innerHTML = `<option selected disabled>Select Local Govt Area</option>`;

                state.disabled = true;

                if (countryId !== NIGERIA_ID) {
                    lgaSelectWrapper.style.display = "none";
                    lgaInputWrapper.style.display = "block";
                } else {
                    lgaSelectWrapper.style.display = "block";
                    lgaInputWrapper.style.display = "none";

                    fetch(`/get-lgas`)
                        .then(res => res.json())
                        .then(lgas => {
                            lgas.forEach(item => {
                                lga.innerHTML +=
                                    `<option value="${item.id}">${item.name}</option>`;
                            });
                        });
                }

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
        });
    </script>
@endsection
