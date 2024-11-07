<!-- resources/views/projects/create.blade.php -->

@extends('layouts.form')

@section('content')
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Project</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="locality_id" class="block text-gray-700 text-sm font-bold mb-2">Locality</label>
                <select name="locality_id" id="locality_id" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('locality_id') border-red-500 @enderror">
                    <option value="">Select a locality</option>
                    @foreach ($localities as $locality)
                        <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                    @endforeach
                </select>
                @error('locality_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="builder_id" class="block text-gray-700 text-sm font-bold mb-2">Builder</label>
                <select name="builder_id" id="builder_id" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('builder_id') border-red-500 @enderror">
                    <option value="">Select a builder</option>
                    @foreach ($builders as $builder)
                        <option value="{{ $builder->id }}">{{ $builder->name }}</option>
                    @endforeach
                </select>
                @error('builder_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="project_name" class="block text-gray-700 text-sm font-bold mb-2">Project Name</label>
                <input type="text" name="project_name" id="project_name" required placeholder="Enter project name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('project_name') border-red-500 @enderror"
                    value="{{ old('project_name') }}">
                @error('project_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb=4">
                <label for='price_range' class='block text-gray=700 text-sm font-bold mb=2'>Price Range</label>
                <input type='text' name='price_range' id='price_range' required placeholder='Enter price range'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('price_range') border-red=500 @enderror'
                    value='{{ old('price_range') }}'>
                @error('price_range')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class='mb=4'>
                <label for='bhk_configurations' class='block text-gray=700 text-sm font-bold mb=2'>BHK
                    Configurations</label>
                <input type='text' name='bhk_configurations' id='bhk_configurations' required
                    placeholder='Enter BHK configurations'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('bhk_configurations') border-red=500 @enderror'
                    value='{{ old('bhk_configurations') }}'>
                @error('bhk_configurations')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class='mb=4'>
                <label for='carpet_area_range' class='block text-gray=700 text-sm font-bold mb=2'>Carpet Area Range</label>
                <input type='text' name='carpet_area_range' id='carpet_area_range' required
                    placeholder='Enter carpet area range'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('carpet_area_range') border-red=500 @enderror'
                    value='{{ old('carpet_area_range') }}'>
                @error('carpet_area_range')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class='mb=4'>
                <label for='rera_registration' class='block text-gray=700 text-sm font-bold mb=2'>RERA Registration</label>
                <input type='text' name='rera_registration' id='rera_registration'
                    placeholder='Enter RERA registration number'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('rera_registration') border-red=500 @enderror'
                    value='{{ old('rera_registration') }}'>
                @error('rera_registration')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class='mb=4'>
                <label for='possession_date' class='block text-gray=700 text-sm font-bold mb=2'>Possession Date</label>
                <input type='date' name='possession_date' id='possession_date'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
            </div>

            <!-- Add additional fields as necessary -->

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200 ease-in-out">Add
                    Project</button>
            </div>
        </form>

        <!-- Table to display projects -->
        <h2 class="text-xl font-bold mt-8 mb-4">Projects List</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Locality</th>
                    <th class="py-2 px-4 border-b">Builder</th>
                    <th class="py-2 px-4 border-b">Project Name</th>
                    <th class="py-2 px-4 border-b">Price Range</th>
                    <!-- Add more headers as needed -->
                    <!-- You can also add Created At and Updated At if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="py-2 px=4 border-b">{{ $project->id }}</td>
                        <td class="py-2 px=4 border-b">{{ $project->locality->name }}</td>
                        <!-- Accessing related locality -->
                        <td class="py-2 px=4 border-b">{{ $project->builder->name }}</td>
                        <!-- Accessing related builder -->
                        <td class="py-2 px=4 border-b">{{ $project->project_name }}</td>
                        <td class="py-2 px=4 border-b">{{ $project->price_range }}</td> <!-- Add other fields as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
