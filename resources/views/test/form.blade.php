@extends('layouts.form')

@section('content')
<div class="p-6 mx-auto max-w-7xl">
    <!-- Create New Button -->
    <div class="mb-6">
        <a href="{{ route('form.create') }}"
           class="inline-flex items-center px-4 py-2 font-medium text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Create New Entry
        </a>
    </div>

    <!-- Cities List -->
    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Cities and Localities</h2>
        </div>

        <div class="divide-y divide-gray-200">
            @forelse ($cities as $city)
                <div class="p-6">
                    <!-- City Information -->
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">{{ $city->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $city->state }}, {{ $city->country }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('cityLocality.edit', $city->id) }}"
                               class="px-3 py-1 text-sm text-blue-700 bg-blue-100 rounded hover:bg-blue-200">
                                Edit
                            </a>
                            <button onclick="confirmDelete({{ $city->id }})"
                                    class="px-3 py-1 text-sm text-red-700 bg-red-100 rounded hover:bg-red-200">
                                Delete
                            </button>
                        </div>
                    </div>

                    <!-- Localities -->
                    @if($city->localities->count() > 0)
                        <div class="ml-6">
                            <h4 class="mb-2 text-sm font-medium text-gray-700">Localities:</h4>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                                @foreach($city->localities as $locality)
                                    <div class="p-4 rounded-lg bg-gray-50">
                                        <h5 class="font-medium text-gray-800">{{ $locality->name }}</h5>

                                        <!-- Landmarks -->
                                        @if($locality->landmarks->count() > 0)
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-600">Landmarks:</p>
                                                <ul class="ml-4 text-sm text-gray-600 list-disc">
                                                    @foreach($locality->landmarks as $landmark)
                                                        <li>{{ $landmark->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <!-- Projects -->
                                        @if($locality->projects->count() > 0)
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-600">Projects:</p>
                                                <ul class="ml-4 text-sm text-gray-600 list-disc">
                                                    @foreach($locality->projects as $project)
                                                        <li>{{ $project->project_name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <div class="p-6 text-center text-gray-500">
                    No cities found. Create your first city entry!
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
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
