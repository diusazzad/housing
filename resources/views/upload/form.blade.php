@extends('layouts.form')

@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
        <div class="max-w-6xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Cities</h2>

            <!-- Display success message -->
            @if (session('success'))
                <div class="mb-6 text-green-500">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Cities Index -->
            <h3 class="text-lg font-medium text-gray-700 mt-8">Cities List</h3>
            <ul class="list-disc list-inside mb-6">
                @foreach ($cities as $city)
                    <li>{{ $city->name }}, {{ $city->state }}, {{ $city->country }}</li>
                @endforeach
            </ul>

            <!-- Create City Form -->
            <h3 class="text-lg font-medium text-gray-700 mt-8">Add New City</h3>
            <form action="{{ route('form.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- City Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">City Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Enter city name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required />
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- State -->
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">State <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="state" name="state" value="{{ old('state') }}"
                        placeholder="Enter state"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required />
                    @error('state')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Country -->
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">Country <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="country" name="country" value="{{ old('country') }}"
                        placeholder="Enter country"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required />
                    @error('country')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                        City</button>
                </div>
            </form>
        </div>
    </div>
@endsection
