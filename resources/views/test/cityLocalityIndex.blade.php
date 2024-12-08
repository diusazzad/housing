@extends('layouts.form')

@section('content')
<div class="p-6 mx-auto max-w-7xl">
    <!-- Stats Section -->
    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
        <div class="p-6 bg-white shadow-sm rounded-xl">
            <div class="flex items-center">
                <div class="p-3 text-blue-600 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Cities</h3>
                    <p class="text-2xl font-bold text-blue-600">{{ $cities->count() }}</p>
                </div>
            </div>
        </div>

        <div class="p-6 bg-white shadow-sm rounded-xl">
            <div class="flex items-center">
                <div class="p-3 text-green-600 bg-green-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Localities</h3>
                    <p class="text-2xl font-bold text-green-600">{{ $cities->sum(function($city) { return $city->localities->count(); }) }}</p>
                </div>
            </div>
        </div>

        <div class="p-6 bg-white shadow-sm rounded-xl">
            <div class="flex items-center">
                <div class="p-3 text-purple-600 bg-purple-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">Active Projects</h3>
                    <p class="text-2xl font-bold text-purple-600">{{ $activeProjects ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Header with Create Button -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Cities and Localities Management</h1>
        <a href="{{ route('cityLocality.create') }}" class="inline-flex items-center px-4 py-2 font-medium text-white transition duration-150 bg-blue-600 rounded-lg hover:bg-blue-700">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Create New Entry
        </a>
    </div>

    <!-- Table Section -->
    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-gray-50">
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            City Details
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Localities
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Projects
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($cities as $city)
                    <tr class="hover:bg-gray-50">
                        <!-- Image Column -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex-shrink-0 w-20 h-20">
                                @if($city->image)
                                    <img class="object-cover w-20 h-20 rounded-lg"
                                         src="{{ asset('images/' . basename($city->image)) }}"
                                         alt="{{ $city->name }}">
                                @else
                                    <div class="flex items-center justify-center w-20 h-20 bg-gray-100 rounded-lg">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </td>

                        <!-- City Details Column -->
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $city->name }}</div>
                            <div class="text-sm text-gray-500">{{ $city->state }}, {{ $city->country }}</div>
                        </td>

                        <!-- Localities Column -->
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap max-w-xs gap-2">
                                @foreach($city->localities as $locality)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $locality->name }}
                                </span>
                                @endforeach
                            </div>
                        </td>

                        <!-- Projects Column -->
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                {{ $city->localities->flatMap->projects->count() }}
                            </div>
                        </td>

                        <!-- Status Column -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                Active
                            </span>
                        </td>

                        <!-- Actions Column -->
                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                            <div class="flex space-x-3">
                                <a href="{{ route('cityLocality.edit', $city->id) }}" class="text-blue-600 hover:text-blue-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <button onclick="confirmDelete({{ $city->id }})" class="text-red-600 hover:text-red-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center py-8">
                                <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <p class="mb-2 text-gray-600">No cities found</p>
                                <p class="text-sm text-gray-500">Get started by creating a new city entry.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($cities->hasPages())
    <div class="mt-6">
        {{ $cities->links() }}
    </div>
    @endif
</div>

<!-- Delete Confirmation Modal Script -->
<script>
    function confirmDelete(cityId) {
        if (confirm('Are you sure you want to delete this city and all its related data?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/cityLocality/${cityId}`;
            form.innerHTML = `
            @csrf
            @method('DELETE')
        `;
            document.body.appendChild(form);
            form.submit();
        }
    }

</script>
@endsection
