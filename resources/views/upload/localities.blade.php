<!-- resources/views/localities/create.blade.php -->

@extends('layouts.form')

@section('content')
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Locality</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('localities.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="city_id" class="block text-gray-700 text-sm font-bold mb-2">City</label>
                <select name="city_id" id="city_id" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('city_id') border-red-500 @enderror">
                    <option value="">Select a city</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Locality Name</label>
                <input type="text" name="name" id="name" required
                    class="shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red=500 @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class='mb=4'>
                <label for='description' class='block text-gray=700 text-sm font-bold mb=2'>Description</label>
                <textarea name='description' id='description' rows='3'
                    class='shadow appearance-none border rounded w-full py=2 
                      px=3 text-gray=700 leading-tight focus:outline-none 
                      focus:shadow-outline @error('description') 
                      border-red=500 @enderror'>{{ old('description') }}</textarea>

                @error('description')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class='flex items-center justify-between  '>
                <button type='submit'
                    class='bg-blue=500 hover:bg-blue=700 text-black font-bold py=2 
                     px=4 rounded focus:outline-none focus:shadow-outline'>Add
                    Locality</button>
            </div>
        </form>

        <!-- Table to display localities -->
        <h2 class='text-xl font-bold mt-8 mb-4'>Localities List</h2>
        <table class='min-w-full bg-white border border-gray=300'>
            <thead>
                <tr>
                    <th class='py=2 px=4 border-b'>ID</th>
                    <th class='py=2 px=4 border-b'>City</th>
                    <th class='py=2 px=4 border-b'>Locality Name</th>
                    <th class='py=2 px=4 border-b'>Description</th>
                    <th class='py=2 px=4 border-b'>Created At</th>
                    <th class='py=2 px=4 border-b'>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($localities as $locality)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $locality->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $locality->city->name }}</td>
                        <!-- Accessing related city name -->
                        <td class="py-2 px-4 border-b">{{ $locality->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $locality->description }}</td>
                        <td class="py-2 px-4 border-b">{{ $locality->created_at->format('Y-m-d H:i') }}</td>
                        <td class="py-2 px-4 border-b">{{ $locality->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
