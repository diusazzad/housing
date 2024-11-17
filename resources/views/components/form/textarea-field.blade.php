<div>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">
        {{ $label }}
    </label>
    <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">{{ $value }}</textarea>
</div>
