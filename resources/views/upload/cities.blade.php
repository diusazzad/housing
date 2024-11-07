<!-- resources/views/cities/create.blade.php -->

@extends('layouts.form')

@section('content')
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add City</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('cities.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">City Name</label>
                <input type="text" name="name" id="name" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="state" class="block text-gray-700 text-sm font-bold mb-2">State</label>
                <input type="text" name="state" id="state" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('state') border-red-500 @enderror"
                    value="{{ old('state') }}">
                @error('state')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country</label>
                <input type="text" name="country" id="country" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('country') border-red-500 @enderror"
                    value="{{ old('country') }}">
                @error('country')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add
                    City</button>
            </div>
        </form>

        <!-- Table to display cities -->
        <h2 class="text-xl font-bold mt-8 mb-4">Cities List</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">City Name</th>
                    <th class="py-2 px-4 border-b">State</th>
                    <th class="py-2 px-4 border-b">Country</th>
                    <th class="py-2 px-4 border-b">Created At</th>
                    <th class="py-2 px-4 border-b">Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $city->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $city->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $city->state }}</td>
                        <td class="py-2 px-4 border-b">{{ $city->country }}</td>
                        <td class="py-2 px-4 border-b">{{ $city->created_at->format('Y-m-d H:i') }}</td>
                        <td class="py-2 px-4 border-b">{{ $city->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
