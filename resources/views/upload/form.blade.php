@extends('layouts.form')

@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add Locality, Builder, Landmark, Project, and Floor Details
        </h2>

        <form action="{{ route('form.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="mb-6">
                    <ul class="list-disc list-inside text-red-500">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- City Selection -->
            <div>
                <label for="city_id" class="block text-sm font-medium text-gray-700">Select City <span
                        class="text-red-500">*</span></label>
                <select id="city_id" name="city_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled selected>Select a city</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Locality Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Locality Name <span
                        class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Enter locality name"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Locality Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Locality Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Enter locality description (optional)"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
            </div>

            <!-- Section: Builder Information -->
            <h3 class="text-lg font-medium text-gray-700 mt-8">Builder Information</h3>

            <!-- Builder Name -->
            <div>
                <label for="builder_name" class="block text-sm font-medium text-gray-700">Builder Name <span
                        class="text-red-500">*</span></label>
                <input type="text" id="builder_name" name="builder_name" value="{{ old('builder_name') }}"
                    placeholder="Enter builder name"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Contact Information -->
            <div>
                <label for="contact_info" class="block text-sm font-medium text-gray-700">Contact Information</label>
                <input type="text" id="contact_info" name="contact_info" value="{{ old('contact_info') }}"
                    placeholder="Enter contact details (optional)"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Section: Landmark Information -->
            <h3 class="text-lg font-medium text-gray-700 mt-8">Landmark Information</h3>

            <!-- Locality Selection -->
            <div>
                <label for="locality_id" class="block text-sm font-medium text-gray-700">Select Locality</label>
                <select id="locality_id" name="locality_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled selected>Select a locality</option>
                    @foreach ($localities as $locality)
                        <option value="{{ $locality->id }}" {{ old('locality_id') == $locality->id ? 'selected' : '' }}>
                            {{ $locality->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Landmark Name -->
            <div>
                <label for="landmark_name" class="block text-sm font-medium text-gray-700">Landmark Name</label>
                <input type="text" id="landmark_name" name="landmark_name" value="{{ old('landmark_name') }}"
                    placeholder="Enter landmark name (optional)"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Section: Project Information -->
            <h3 class="text-lg font-medium text-gray-700 mt-8">Project Information</h3>

            <!-- Project Name -->
            <div>
                <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name <span
                        class="text-red-500">*</span></label>
                <input type="text" id="project_name" name="project_name" value="{{ old('project_name') }}"
                    placeholder="Enter project name"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Section: Floor Details -->
            <h3 class="text-lg font-medium text-gray-700 mt-8">Floor Details</h3>

            <!-- Floor Section -->
            <div>
                <label for "floor_section" class "block text-sm font-medium text-gray - 700">Floor Section</label>
                <input type = "text" id = "floor_section" name = "floor_section" value = "{{ old('floor_section') }}"
                    placeholder = "Enter floor section (optional)"
                    class = "mt - 1 block w - full border border - gray - 300 rounded - md shadow - sm px - 4 py - 2 focus : ring - indigo - 500 focus : border - indigo - 500" />
            </div>

            <!-- Upload Floor Image -->
            <div>
                <label for = "segment_floor_image_1" class = "block text - sm font - medium text - gray - 700">Upload Floor
                    Image</label>
                <input type = "file" id = "segment_floor_image_1" name = "segment_floor_image_1" accept = ".jpg,.jpeg,.png"
                    class = "mt - 1 block w - full text - gray - 500 file : mr - 4 file : py - 2 file : px - 4 file : rounded - md file : border file : border - gray - 300 file : text - sm file : bg - gray - 50 file : text - gray - 700 hover : file : bg - gray - 100" />
            </div>

            <!-- Submit Button -->
            <div class = "mt - 6">
                <button type = "submit"
                    class = "w - full bg - indigo - 600 text - white py - 2 px - 4 rounded - md shadow hover : bg - indigo - 700 focus : outline - none focus : ring - 2 focus : ring-offset - 2 focus : ring - indigo - 500">Save
                    Information</button>
            </div>
        </form>
    </div>
@endsection
