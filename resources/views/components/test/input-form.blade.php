<div class="form-group mb-3">
    <label for="{{ $name }}" class="form-label block mb-2 text-sm text-gray-700">{{ $label }}</label>
    <input type="{{ $type }}"
        class="form-input w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('{{ $name }}') is-invalid @enderror"
        id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}>
</div>

@if ($errors->has('{{ $name }}'))
    <span class="invalid-feedback text-red-600">{{ $message }}</span>
@endif
