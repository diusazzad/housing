@extends('layouts.form')

@section('content')
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Amenity</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('amenities.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">Project</label>
                <select name="project_id" id="project_id" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('project_id') border-red-500 @enderror">
                    <option value="">Select a project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->project_name }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="amenity_name" class="block text-gray-700 text-sm font-bold mb-2">Amenity Name</label>
                <input type="text" name="amenity_name" id="amenity_name" required placeholder="Enter amenity name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('amenity_name') border-red-500 @enderror"
                    value="{{ old('amenity_name') }}">
                @error('amenity_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="3" placeholder="Enter description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200 ease-in-out">
                    Add Amenity
                </button>
            </div>
        </form>

        <!-- Table to display amenities -->
        <div class="overflow-x-auto">
            <h2 class="text-xl font-bold mt-8 mb-4">Amenities List</h2>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">ID</th>
                        <th class="py-2 px-4 border-b text-left">Project</th>
                        <th class="py-2 px-4 border-b text-left">Amenity Name</th>
                        <th class="py-2 px-4 border-b text-left">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($amenities as $amenity)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $amenity->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $amenity->project->project_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $amenity->amenity_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $amenity->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
