<!-- resources/views/project_details/create.blade.php -->

@extends('layouts.form')

@section('content')
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Add New Project Detail</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('projectdetails.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="project_id" class="block text-gray-700 text-sm font-semibold mb-2">Select Project</label>
                <select name="project_id" id="project_id" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Choose a project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->project_name }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="project_specification" class="block text-gray-700 text-sm font-semibold mb-2">Project
                    Specification</label>
                <textarea name="project_specification" id="project_specification" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500 @error('project_specification') border-red-500 @enderror">
                    {{ old('project_specification') }}
                </textarea>
                @error('project_specification')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="locality_advantage" class="block text-gray-700 text-sm font-semibold mb-2">Locality
                    Advantage</label>
                <textarea name="locality_advantage" id="locality_advantage" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500 @error('locality_advantage') border-red-500 @enderror">
                    {{ old('locality_advantage') }}
                </textarea>
                @error('locality_advantage')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="review" class="block text-gray-700 text-sm font-semibold mb-2">Review</label>
                <textarea name="review" id="review" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indgo-500 @error('review') border-red-500 @enderror">
                    {{ old('review') }}
                </textarea>
                @error('review')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="project_brochure" class="block text-gray-700 text-sm font-semibold mb-2">Project Brochure
                    URL</label>
                <input type="text" name="project_brochure" id="project_brochure"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500 @error('project_brochure') border-red-500 @enderror">
                @error('project_brochure')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="project_payment_plan" class="block text-gray-700 text-sm font-semibold mb-2">Payment
                    Plan</label>
                <textarea name="project_payment_plan" id="project_payment_plan" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500 @error('project_payment_plan') border-red-500 @enderror">
                    {{ old('project_payment_plan') }}
                </textarea>
                @error('project_payment_plan')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="project_offer" class="block text-gray-700 text-sm font-semibold mb-2">Project Offer</label>
                <textarea name="project_offer" id="project_offer" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500 @error('project_offer') border-red-500 @enderror">
                    {{ old('project_offer') }}
                </textarea>
                @error('project_offer')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image_path" class="block text-gray-700 text-sm font-semibold mb-2">Upload Project Image</label>
                <input type="file" name="image_path" id="image_path" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500">
                @error('image_path')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-offset-blue transition duration-200 ease-in-out">
                    Add Project Detail
                </button>
            </div>
        </form>

        <h2 class="text-xl font-bold mt-8 mb-4 text-center">Existing Project Details</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Project Name</th>
                    <th class="py-2 px-4 border-b">Specification</th>
                    <th class="py-2 px-4 border-b">Locality Advantage</th>
                    <th class="py-2 px-4 border-b">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projectDetails as $detail)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $detail->id }}</td>
                        <td class="py-2 px-4 border-b">{{ optional($detail->project)->project_name }}</td>
                        <td class="py-2 px-4 border-b">{{ $detail->project_specification }}</td>
                        <td class="py-2 px-4 border-b">{{ $detail->locality_advantage }}</td>
                        <td class="py-2 px-4 border-b">
                            <img src="{{ asset('storage/' . $detail->image_path) }}" alt="Project Image"
                                style="width: 100px; height: auto;">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
