{{-- // resources/views/components/form/input.blade.php --}}
@props(['cities'])

<div>
    <label for="city_id" class="block text-sm font-medium text-gray-700">
        Select City <span class="text-red-500">*</span>
    </label>
    <select id="city_id" name="city_id" required
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
        <option value="" disabled selected>Select a city</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>
</div>
