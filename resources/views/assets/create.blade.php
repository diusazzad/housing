@extends('layouts.form')

@section('content')
    <div class="flex justify-center p-6">
        <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Asset Information</h2>
            <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Company -->
                <x-form.input name="company" label="Company" required />

                <!-- Asset Name -->
                <x-form.input name="asset_name" label="Asset Name" required />

                <!-- Asset Tag -->
                <x-form.input name="asset_tag" label="Asset Tag" required />

                <!-- Serial Number -->
                <x-form.input name="serial" label="Serial Number" />

                <!-- Status -->
                <x-form.select name="status" label="Status" :options="['active' => 'Active', 'inactive' => 'Inactive', 'maintenance' => 'Maintenance']" />

                <!-- Default Location -->
                <x-form.input name="default_location" label="Default Location" />

                <!-- Upload Image -->
                <div class="form-group">
                    <label for="image" class="block text-sm font-medium text-gray-700">Asset Image</label>
                    <input type="file" name="image" id="image"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                        accept=".jpg,.jpeg,.png,.gif">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Warranty -->
                <x-form.input name="warranty" label="Warranty (months)" type="number" min="0" max="120"
                    required />

                <!-- Next Audit Date -->
                <x-form.input name="next_audit_date" label="Next Audit Date" type="date" required />

                <!-- Order Number -->
                <x-form.input name="order_number" label="Order Number" required />

                <!-- Purchase Date -->
                <x-form.input name="purchase_date" label="Purchase Date" type="date" required />

                <!-- EOL Date -->
                <x-form.input name="eol_date" label="EOL Date" type="date" required />

                <!-- Supplier -->
                <x-form.input name="supplier" label="Supplier" required />

                <!-- Purchase Cost -->
                <x-form.input name="purchase_cost" label="Purchase Cost (USD)" type="number" step=".01" required />

                <!-- Notes -->
                <div class="form-group">
                    <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                    <textarea name="notes" id="notes" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save
                        Asset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
