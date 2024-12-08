@extends('layouts.form')

@section('content')
<div class="max-w-4xl p-8 mx-auto bg-white shadow-lg rounded-xl">
    <h2 class="pb-4 mb-8 text-3xl font-bold text-gray-900 border-b">Edit City: {{ $city->name }}</h2>

    <form method="POST" action="{{ route('cityLocality.update', $city->id) }}" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- City Information -->
        <div class="p-6 space-y-6 rounded-lg bg-gray-50">
            <h3 class="mb-4 text-xl font-semibold text-gray-800">City Details</h3>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label for="city-name" class="block text-sm font-semibold text-gray-700">City Name</label>
                    <input type="text" id="city-name" name="city[name]" required
                        class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ old('city.name', $city->name) }}">
                </div>

                <div>
                    <label for="city-state" class="block text-sm font-semibold text-gray-700">State</label>
                    <input type="text" id="city-state" name="city[state]" required
                        class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ old('city.state', $city->state) }}">
                </div>

                <div class="md:col-span-2">
                    <label for="city-country" class="block text-sm font-semibold text-gray-700">Country</label>
                    <input type="text" id="city-country" name="city[country]" required
                        class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ old('city.country', $city->country) }}">
                </div>
            </div>
        </div>

        <!-- Localities -->
        <div class="p-6 rounded-lg bg-gray-50">
            <h3 class="mb-4 text-xl font-semibold text-gray-800">Localities</h3>
            <div id="locality-container" class="space-y-4">
                @foreach($city->localities as $locality)
                    <div class="p-4 bg-white border rounded-lg">
                        <input type="hidden" name="localities[{{ $locality->id }}][id]" value="{{ $locality->id }}">
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700">Locality Name</label>
                            <input type="text" name="localities[{{ $locality->id }}][name]"
                                class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg"
                                value="{{ old("localities.{$locality->id}.name", $locality->name) }}">
                        </div>

                        <!-- Add fields for landmarks and projects as needed -->
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex justify-end mt-8">
            <button type="submit"
                class="px-6 py-3 font-medium text-white bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700">
                Update City & Localities
            </button>
        </div>
    </form>

    @if ($errors->any())
        <div class="p-4 mt-6 border border-red-200 rounded-lg bg-red-50">
            <div class="flex">
                <svg class="w-5 h-5 mr-3 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <ul class="text-sm text-red-600 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
@endsection
