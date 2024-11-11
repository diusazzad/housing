<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		// return false;
		// return auth()->check();
		// return $this->is('localities'); // Allow authorization only for '/localities' route


		// if ($this->is('localities')) {
		//     // Allow authorization only for '/localities' route
		//     return true;
		// } elseif ($this->is('landmarks')) {
		//     // Allow authorization only for '/landmarks' route
		//     return true;
		// }
		// return in_array($this->route()->getName(), ['cities.store', 'localities.store', 'landmarks.store']);

		// if ($this->is('localities') || $this->is('landmarks') || $this->is('projects')) {
		//     return true;
		// }

		// Default return value for all other routes
		return true;
		// return $this->is(['cities', 'localities', 'builders', 'landmarks', 'projects', 'amenities', 'projectdetails']);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{

		// return [
		// 'city_id' => 'required|exists:cities,id',
		// 'name' => 'required|string|max:255',
		// 'description' => 'nullable|string',
		// ];

		// if ($this->is('cities')) {
		//     return [
		//         'name' => 'required|string|max:255',
		//         'state' => 'required|string|max:255',
		//         'country' => 'required|string|max:255',
		//     ];
		// } elseif ($this->is('localities')) {
		//     return [
		//         'city_id' => 'required|exists:cities,id',
		//         'name' => 'required|string|max:255',
		//         'description' => 'nullable|string',
		//     ];
		// } elseif ($this->is('landmarks')) {
		//     return [
		//         'city_id' => 'required|exists:cities,id',
		//         'locality_id' => 'required|exists:localities,id',
		//         'name' => 'required|string|max:255',
		//         'description' => 'nullable|string',
		//     ];
		// }
		// return [];

		switch ($this->route()->getName()) {
			case 'cities.store':
				return [
					'name' => 'required|string|max:255',
					'state' => 'required|string|max:255',
					'country' => 'required|string|max:255',
				];
			case 'localities.store':
				return [
					'city_id' => 'required|exists:cities,id',
					'name' => 'required|string|max:255',
					'description' => 'nullable|string',
				];
			case 'landmarks.store':
				return [
					// 'city_id' => 'required|exists:cities,id',
					'locality_id' => 'required|exists:localities,id',
					'name' => 'required|string|max:255',
					'description' => 'nullable|string',
				];
			case 'builders.store':
				return [
					'name' => 'required|string|max:255',
					'contact_info' => 'nullable|string|max:255',
					'established_year' => 'nullable|integer|min:1900|max:' . date('Y'), // Valid year range
					'description' => 'nullable|string',
					'website' => 'nullable|url', // Valid URL format
				];
			case 'projects.store':
				return [
					'locality_id' => 'required|exists:localities,id',
					'builder_id' => 'required|exists:builders,id',
					'project_name' => 'required|string|max:255',
					'price_range' => 'required|string|max:255',
					'bhk_configurations' => 'required|string|max:255',
					'carpet_area_range' => 'required|string|max:255',
					'rera_registration' => 'nullable|string|max:255',
					'possession_date' => 'nullable|date',
				];
			case 'amenities.store':
				return [
					'project_id' => 'required|exists:projects,id', // Ensure project exists
					'amenity_name' => 'required|string|max:255',
					'description' => 'nullable|string',
				];
			case 'projectdetails.store':
				return [
					'project_id' => 'required|exists:projects,id',
					'project_specification' => 'nullable|string',
					'locality_advantage' => 'nullable|string',
					'review' => 'nullable|string',
					'project_brochure' => 'nullable|string',
					'project_payment_plan' => 'nullable|string',
					'project_offer' => 'nullable|string',
					'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max size as needed
				];
			default:
				return [];
		}
	}
}
