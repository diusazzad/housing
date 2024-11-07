<!-- resources/views/landmarks/create.blade.php -->

@extends('layouts.form')

@section('content')
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Landmark</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('landmarks.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Landmark Name</label>
                <input type="text" name="name" id="name" placeholder="Enter landmark name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="3" placeholder="Enter a brief description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200 ease-in-out">Add
                    Landmark</button>
            </div>
        </form>

        <!-- Table to display landmarks -->
        <h2 class="text-xl font-bold mt-8 mb-4">Landmarks List</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Locality</th>
                    <th class="py=2 px-4 border-b">Landmark Name</th>
                    <th class="py=2 px-4 border-b">Description</th>
                    <th class="py=2 px-4 border-b">Created At</th>
                    <th class="py=2 px-4 border-b">Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($landmarks as $landmark)
                    <tr>
                        <td class="py=2 px-4 border-b">{{ $landmark->id }}</td>
                        <td class="py=2 px-4 border-b">{{ $landmark->locality->name }}</td>
                        <!-- Accessing related locality name -->
                        <td class="py=2 px-4 border-b">{{ $landmark->name }}</td>
                        <td class="py=2 px-4 border-b">{{ $landmark->description }}</td>
                        <td class="py=2 px-4 border-b">{{ $landmark->created_at->format('Y-m-d H:i') }}</td>
                        <td class="py=2 px-4 border-b">{{ $landmark->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
