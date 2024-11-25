<!-- resources/views/locations/create.blade.php -->
@extends('layouts.form')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Create City and Localities</h1>

    <form action="{{ route('cityLocality.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- City Information -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">City Information</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="city_name" class="block text-sm font-medium text-gray-700">City Name</label>
                    <input type="text" name="city_name" id="city_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('city_name') }}">
                    @error('city_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                    <input type="text" name="state" id="state" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('state') }}">
                    @error('state')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <input type="text" name="country" id="country" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('country') }}">
                    @error('country')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Builder Information -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Builder Information</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="builder_name" class="block text-sm font-medium text-gray-700">Builder Name</label>
                    <input type="text" name="builder_name" id="builder_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('builder_name')
                    <span class='text-red=500 text-sm'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="builder_contact_info" class="block text-sm font-medium text-gray-700">Contact Info</label>
                    <input type="text" name="builder_contact_info" id="builder_contact_info" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('builder_contact_info')
                    <span='text-red=500 text-sm'>{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-4">
                    <label for='builder_established_year' class='block  text-sm font-medium  text-gray  700'>Established Year</label>
                    <input type='number' name='builder_established_year' id='builder_established_year' placeholder='e.g., 2020' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'>
                    @error('builder_established_year')
                    <span class='text-red=500 text-sm'>{{ $message }}</span>
                    @enderror
                </div>

                <div class='mb=4'>
                    <label for='builder_description' class='block  text-sm font-medium  text-gray  700'>Description</label>
                    <textarea name='builder_description' id='builder_description' rows='3' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'></textarea>
                    @error('builder_description')
                    <span class='text-red=500 text-sm'>{{ $message }}</span>
                    @enderror
                </div>

                <div class='mb=4'>
                    <label for='builder_website' class='block  text-sm font-medium  text-gray  700'>Website</label>
                    <input type='url' name='builder_website' id='builder_website' placeholder='https://example.com' pattern='https?://.+' title='Please enter a valid URL starting with http or https' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'>
                    @error('builder_website')
                    <span class='text-red=500 text-sm'>{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Localities Information -->
        <h2 class="text-xl font-semibold mb-4">Localities</h2>

        <div id="localities-container">
            <div class="locality bg-white shadow-md rounded-lg p-6 mb-4">
                <h3 class="text-lg font-semibold mb-2">Locality 1</h3>

                <!-- Locality Name -->
                <div class='mb=4'>
                    <label for='locality_name_0' class='block text-sm font-medium text-gray=700'>Locality Name</label>
                    <input type='text' name='localities[0][name]' id='locality_name_0' required class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'>
                    @error('localities.0.name')
                    <span class='text-red=500 text-sm'>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Locality Description -->
                <div class='mb=4'>
                    <label for='locality_description_0' class='block text-sm font-medium text-gray=700'>Description</label>
                    <textarea name='localities[0][description]' id='locality_description_0' rows='3' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'></textarea>
                    @error('localities.0.description')
                    <span class='text-red=500 text-sm'>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Landmarks Information -->
                <h4 class='text-lg font-semibold mt-4'>Landmarks</h4>
                <div class='landmarks-container'>
                    <div class='landmark mb=4'>
                        <label for='landmark_name_0' class='block text-sm font-medium text-gray=700'>Landmark Name</label>
                        <input type='text' name='localities[0][landmarks][0][name]' id='landmark_name_0' required class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'>
                        @error('localities.0.landmarks.0.name')
                        <span class='text-red=500 text-sm'>{{ $message }}</span>
                        @enderror

                        <!-- Landmark Description -->
                        <label for='landmark_description_0' class='block text-sm font-medium text-gray=700 mt=2'>Description</label>
                        <textarea name='localities[0][landmarks][0][description]' id='landmark_description_0' rows='2' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'></textarea>
                        @error('localities.0.landmarks.0.description')
                        <span class='text-red=500 text-sm'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Projects Information -->
                <h4 class="text-lg font-semibold mt-4">Projects</h4>
                <div class="projects-container">
                    <div class="project mb-4">
                        <label for="project_name_0" class="block text-sm font-medium text-gray-700">Project Name</label>
                        <input type="text" name="localities[0][projects][0][project_name]" id="project_name_0" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('localities.0.projects.0.project_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <!-- Price Range -->
                        <label for="price_range_0" class="block text-sm font-medium text-gray-700 mt-2">Price Range</label>
                        <input type="text" name="localities[0][projects][0][price_range]" id="price_range_0" required placeholder='"₹37.5 L - ₹52.0 L"' class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('localities.0.projects.0.price_range')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <!-- BHK Configurations -->
                        <label for="bhk_configurations_0" class="block text-sm font-medium text-gray-700 mt-2">BHK Configurations</label>
                        <input type="text" name="localities[0][projects][0][bhk_configurations]" id="bhk_configurations_0" required placeholder='"1 BHK, 2 BHK"' class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('localities.0.projects.0.bhk_configurations')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <!-- Carpet Area Range -->
                        <label for="carpet_area_range_0" class="block text-sm font-medium text-gray-700 mt-2">Carpet Area Range</label>
                        <input type="text" name="localities[0][projects][0][carpet_area_range]" id="carpet_area_range_0" required placeholder='"407 sq.ft - 550 sq.ft"' class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('localities.0.projects.0.carpet_area_range')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <!-- RERA Registration -->
                        <label for='rera_registration_0' class='block text-sm font-medium text-gray=700 mt=2'>RERA Registration</label>
                        <input type='text' name='localities[0][projects][0][rera_registration]' id='rera_registration_0' placeholder='"RERA123456"' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'>

                        @error('localities.0.projects.0.rera_registration')
                        <span class='text-red=500 text-sm'>{{ $message }}</span>
                        @enderror

                        <!-- Possession Date -->
                        <label for='possession_date_0' class='block text-sm font-medium text-gray=700 mt=2'>Possession Date</label>
                        <input type='date' name='localities[0][projects][0][possession_date]' id='possession_date_0' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'>
                        @error('localities.0.projects.0.possession_date')
                        <span class='text-red=500 text-sm'>{{ $message }}</span>
                        @enderror

                    </div> <!-- End of Project Section -->
                </div> <!-- End of Projects Container -->
                <!-- Project Details Information -->
                <h4 class="text-lg font-semibold mt-4">Project Details</h4>
                <div class="project-details-container">
                    <div class="project-detail mb-4">
                        <label for="project_specification_0" class="block text-sm font-medium text-gray-700">Project Specification</label>
                        <textarea name="localities[0][projects][0][project_details][0][project_specification]" id="project_specification_0" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        @error('localities.0.projects.0.project_details.0.project_specification')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="locality_advantage_0" class="block text-sm font-medium text-gray-700">Locality Advantage</label>
                        <textarea name="localities[0][projects][0][project_details][0][locality_advantage]" id="locality_advantage_0" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        @error('localities.0.projects.0.project_details.0.locality_advantage')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="review_0" class="block text-sm font-medium text-gray-700">Review</label>
                        <textarea name="localities[0][projects][0][project_details][0][review]" id="review_0" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        @error('localities.0.projects.0.project_details.0.review')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="project_brochure_0" class="block text-sm font-medium text-gray-700">Project Brochure (URL)</label>
                        <input type="text" name="localities[0][projects][0][project_details][0][project_brochure]" id="project_brochure_0" placeholder='https://example.com/brochure.pdf' class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo=500">
                        @error('localities.0.projects.0.project_details.0.project_brochure')
                        <span class='text-red=500 text-sm'>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class='mb=4'>
                        <label for='project_payment_plan_0' class='block text-sm font-medium text-gray=700'>Project Payment Plan</label>
                        <textarea name='localities[0][projects][0][project_details][0][project_payment_plan]' id='project_payment_plan_0' rows='3' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'></textarea>
                        @error('localities.0.projects.0.project_details.0.project_payment_plan')
                        <span class='text-red=500 text-sm'>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class='mb=4'>
                        <label for='project_offer_0' class='block text-sm font-medium text-gray=700'>Project Offer</label>
                        <textarea name='localities[0][projects][0][project_details][0][project_offer]' id='project_offer_0' rows='3' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'></textarea>
                        @error('localities.0.projects.0.project_details.0.project_offer')
                        <span class='text-red=500 text-sm'>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class='mb=4'>
                        <label for='image_path_0' class='block text-sm font-medium text-gray=700'>Upload Image</label>
                        <input type='file' name='localities[0][projects][0][project_details][0][image_path]' id='image_path_0' accept='image/*' class='mt=1 block w-full border-gray=300 rounded-md shadow-sm focus:border-indigo=500 focus:ring-indigo=500'>
                        @error('localities.0.projects.0.project_details.0.image_path')
                        <span class='text-red=500 text-sm'>{{ $message }}</span>
                        @enderror
                    </div>

                </div> <!-- End of Project Details Container -->
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Submit</button>
        </div>
    </form>

</div>
@endsection

