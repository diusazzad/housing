@extends('layouts.form')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Create City</h2>

        <form method="POST" action="{{ route('form.store') }}">
            @csrf

            <!-- City Information -->
            <div class="mb-4">
                <label for="city-name" class="block mb-2 text-sm font-medium text-gray-700">City Name</label>
                <input type="text" id="city-name" name="city[name]" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('city.name', '') }}">
            </div>

            <div class="mb-4">
                <label for="city-state" class="block mb-2 text-sm font-medium text-gray-700">State</label>
                <input type="text" id="city-state" name="city[state]" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('city.state', '') }}">
            </div>

            <div class="mb-4">
                <label for="city-country" class="block mb-2 text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="city-country" name="city[country]" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('city.country', '') }}">
            </div>

            <!-- Localities -->
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Add Localities</h3>
            <div id="locality-container">
                <!-- Locality template will be inserted here -->
            </div>

            <button type="button" onclick="addLocality()"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                Add Locality
            </button>

            <button type="submit"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                Create City & Localities
            </button>
        </form>
    </div>

    @if ($errors->any())
        <div class="mt-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
