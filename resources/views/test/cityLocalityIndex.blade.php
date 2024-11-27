@extends('layouts.form')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Project Listings</h1>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($projects as $project)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            @if($project->projectDetails->first() && $project->projectDetails->first()->image_path)
            <img src="{{ asset('images/' . $project->projectDetails->first()->image_path) }}" alt="{{ $project->project_name }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                No Image
            </div>
            @endif

            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $project->project_name }}</h2>

                <div class="space-y-2 text-sm text-gray-600">
                    <p><strong>Locality:</strong> {{ $project->locality->name }}</p>
                    <p><strong>Builder:</strong> {{ $project->builder->name }}</p>
                    <p><strong>Price Range:</strong> {{ $project->price_range }}</p>
                    <p><strong>BHK Configurations:</strong> {{ $project->bhk_configurations }}</p>

                    @if($project->projectDetails->first())
                    <div class="mt-4">
                        <h3 class="font-medium text-gray-700">Project Specification</h3>
                        <p class="text-sm text-gray-500">
                            {{ Str::limit($project->projectDetails->first()->project_specification, 100) }}
                        </p>
                    </div>
                    @endif
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('projects.show', $project->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        View Details
                    </a>
                    <span class="text-sm text-gray-500">
                        @if($project->possession_date)
                        Possession: {{ \Carbon\Carbon::parse($project->possession_date)->format('M Y') }}
                        @endif
                    </span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-8">
            <p class="text-gray-600">No projects found.</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination (if applicable) --}}
    <div class="mt-8">
        {{ $projects->links() }}
    </div>
</div>
@endsection
