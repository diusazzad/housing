<!-- resources/views/builders/create.blade.php -->

@extends('layouts.form')

@section('content')
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Builder</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('builders.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" required placeholder="Enter builder name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contact_info" class="block text-gray-700 text-sm font-bold mb-2">Contact Info</label>
                <input type="text" name="contact_info" id="contact_info" placeholder="Enter contact info"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('contact_info') border-red-500 @enderror"
                    value="{{ old('contact_info') }}">
                @error('contact_info')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb=4">
                <label for='established_year' class='block text-gray=700 text-sm font-bold mb=2'>Established Year</label>
                <input type='number' name='established_year' id='established_year' placeholder='Enter established year'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('established_year') border-red=500 @enderror'
                    value='{{ old('established_year') }}'>
                @error('established_year')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class='mb=4'>
                <label for='description' class='block text-gray=700 text-sm font-bold mb=2'>Description</label>
                <textarea name='description' id='description' rows='3' placeholder='Enter description'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red=500 @enderror'>{{ old('description') }}</textarea>
                @error('description')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class='mb=4'>
                <label for='website' class='block text-gray=700 text-sm font-bold mb=2'>Website</label>
                <input type='url' name='website' id='website' placeholder='Enter website URL'
                    class='shadow appearance-none border rounded w-full py=2 px=3 text-gray=700 leading-tight focus:outline-none focus:shadow-outline @error('website') border-red=500 @enderror'
                    value='{{ old('website') }}'>
                @error('website')
                    <p class='text-red=500 text-xs italic'>{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200 ease-in-out">Add
                    Builder</button>
            </div>
        </form>

        <!-- Table to display builders -->
        <h2 class="text-xl font-bold mt-8 mb-4">Builders List</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Contact Info</th>
                    <th class="py-2 px-4 border-b">Established Year</th>
                    <!-- Add more headers as needed -->
                    <!-- You can also add Created At and Updated At if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($builders as $builder)
                    <tr>
                        <td class="py-2 px=4 border-b">{{ $builder->id }}</td>
                        <td class="py=2 px=4 border-b">{{ $builder->name }}</td>
                        <td class="py=2 px=4 border-b">{{ $builder->contact_info }}</td>
                        <td class="py=2 px=4 border-b">{{ $builder->established_year }}</td>
                        <!-- Add more fields as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
