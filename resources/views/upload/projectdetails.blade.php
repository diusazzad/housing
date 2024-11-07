<!-- resources/views/project_details/create.blade.php -->

@extends('layouts.form')

@section('content')
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Project Detail</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('project_details.store') }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">Project</label>
                <select name="project_id" id="project_id" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('project_id') border-red-500 @enderror">
                    <option value="">Select a project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                    @endforeach
                </select>
                @error('project_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="project_specification" class="block text-gray-700 text-sm font-bold mb-2">Project
                    Specification</label>
                <textarea name="project_specification" id="project_specification" rows="3"
                    placeholder="Enter project specification"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('project_specification') border-red-500 @enderror">{{ old('project_specification') }}</textarea>
                @error('project_specification')
                    <p class='text-red-500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb=4">
                <label for='locality_advantage' class='block text-gray=700 text-sm font-bold mb=2'>Locality
                    Advantage</label>
                <textarea name='locality_advantage' id='locality_advantage' rows='3' placeholder='Enter locality advantage'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('locality_advantage') border-red=500 @enderror'>{{ old('locality_advantage') }}</textarea>
                @error('locality_advantage')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb=4">
                <label for='review' class='block text-gray=700 text-sm font-bold mb=2'>Review</label>
                <textarea name='review' id='review' rows='3' placeholder='Enter review'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('review') border-red=500 @enderror'>{{ old('review') }}</textarea>
                @error('review')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb=4">
                <label for='project_brochure' class='block text-gray=700 text-sm font-bold mb=2'>Project Brochure</label>
                <input type='text' name='project_brochure' id='project_brochure' placeholder='Enter project brochure URL'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('project_brochure') border-red=500 @enderror'
                    value='{{ old('project_brochure') }}'>
                @error('project_brochure')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb=4">
                <label for='project_payment_plan' class='block text-gray=700 text-sm font-bold mb=2'>Payment Plan</label>
                <textarea name='project_payment_plan' id='project_payment_plan' rows='3' placeholder='Enter payment plan'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('project_payment_plan') border-red=500 @enderror'>{{ old('payment_plan') }}</textarea>
                @error('payment_plan')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb=4">
                <label for='project_offer' class='block text-gray=700 text-sm font-bold mb=2'>Project Offer</label>
                <textarea name='project_offer' id='project_offer' rows='3' placeholder='Enter any offers'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('payment_plan') border-red=500 @enderror'>{{ old('payment_plan') }}</textarea>
                @error('payment_plan')
                    <p class='text-red-500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb=4">
                <label for='image_path' class='block text-gray=700 text-sm font-bold mb=2'>Image Path</label>
                <input type='text' name='image_path' id='image_path' required placeholder='Enter image path'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('image_path') border-red=500 @enderror'
                    value='{{ old('image_path') }}'>
                @error('image_path')
                    <p class='text-red-500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <!-- Add additional fields as necessary -->

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200 ease-in-out">Add
                    Project Detail</button>
            </div>
        </form>

        <!-- Table to display project details -->
        <h2 class="text-xl font-bold mt-8 mb-4">Project Details List</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Project Name</th> <!-- You can access related project -->
                    <!-- Add other headers as needed -->
                    <!-- You can also add Created At and Updated At if needed -->
                </tr>
            </thead>
            <tbody>
                <!-- Loop through existing project details and display them -->
            </tbody>
        </table>

    </div>
@endsection
