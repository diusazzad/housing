<div class="form-group mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}"
        {{ $required ? 'required' : '' }}>
        <option value="">Select {{ $label }}</option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ old($name) == $key ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
