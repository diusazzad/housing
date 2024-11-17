<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Builder;
use App\Models\City;
use App\Models\Floor;
use App\Models\Landmark;
use App\Models\Locality;
use App\Models\Project;
use Illuminate\Http\Request;

class cmsController extends Controller
{
    public function form()
    {
        // Fetch cities and localities from the database
        $cities = City::all(); // Assuming you have a City model
        $localities = Locality::all(); // Assuming you have a Locality model
    
        // Return the view with the necessary data
        return view('upload.form', [
            'cities' => $cities,
            'localities' => $localities,
        ]);
    }
    public function createForm(Request $request){

        // Validate the incoming request
    $validated = $request->validate([
        // City validation
        'city_id' => 'required|exists:cities,id',
        
        // Locality validation
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',

        // Builder validation
        'builder_name' => 'required|string|max:255',
        'contact_info' => 'nullable|string',
        'established_year' => 'nullable|integer',
        'builder_description' => 'nullable|string',
        'website' => 'nullable|url',

        // Landmark validation
        'locality_id' => 'nullable|exists:localities,id',
        'landmark_name' => 'nullable|string|max:255',
        'landmark_description' => 'nullable|string',

        // Project validation
        'project_locality_id' => 'nullable|exists:localities,id',
        'builder_id' => 'nullable|exists:builders,id',
        'project_name' => 'required|string|max:255',
        'price_range' => 'nullable|string',
        'bhk_configurations' => 'nullable|string',

        // Floor validation
        'project_id' => 'nullable|exists:projects,id',
        'floor_section' => 'nullable|string',
        'floor_segment_1' => 'nullable|string',
        'segment_price_1' => 'nullable|numeric',
        'segment_sqft_1' => 'nullable|numeric',
        'segment_emi_1' => 'nullable|numeric',
        'segment_floor_image_1' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    try {
        // Save Locality
        $locality = Locality::create([
            'city_id' => $validated['city_id'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        // Save Builder
        $builder = Builder::create([
            'name' => $validated['builder_name'],
            'contact_info' => $validated['contact_info'] ?? null,
            'established_year' => $validated['established_year'] ?? null,
            'description' => $validated['builder_description'] ?? null,
            'website' => $validated['website'] ?? null,
        ]);

        // Save Landmark
        $landmark = Landmark::create([
            'locality_id' => $validated['locality_id'] ?? null,
            'name' => $validated['landmark_name'] ?? null,
            'description' => $validated['landmark_description'] ?? null,
        ]);

        // Save Project
        $project = Project::create([
            'locality_id' => $validated['project_locality_id'] ?? null,
            'builder_id' => $builder->id,
            'name' => $validated['project_name'],
            'price_range' => $validated['price_range'] ?? null,
            'bhk_configurations' => $validated['bhk_configurations'] ?? null,
        ]);

        // Save Floor
        $floorData = [
            'project_id' => $project->id,
            'section' => $validated['floor_section'] ?? null,
            'segment_1' => $validated['floor_segment_1'] ?? null,
            'price_1' => $validated['segment_price_1'] ?? null,
            'sqft_1' => $validated['segment_sqft_1'] ?? null,
            'emi_1' => $validated['segment_emi_1'] ?? null,
        ];

        // Handle Floor Image Upload
        if ($request->hasFile('segment_floor_image_1')) {
            $floorData['image_1'] = $request->file('segment_floor_image_1')->store('floor_images', 'public');
        }

        Floor::create($floorData);

        return redirect()->route('form.create')->with('success', 'Data saved successfully!');
    } catch (\Exception $e) {
        return redirect()->route('form.create')->with('error', 'Failed to save data: ' . $e->getMessage());
    }
    }
}
