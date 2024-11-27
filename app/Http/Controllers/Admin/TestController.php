<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Builder;
use App\Models\City;
use App\Models\ImageTestModel;
use App\Models\Landmark;
use App\Models\Locality;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class TestController extends Controller
{
    public function index()
    {
        return view('test.imageTest');
    }
    public function store(Request $request)
    {
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        return back()

            ->with('success', 'You have successfully upload image.')

            ->with('image', $imageName);
    }
    public function formIndex()
    {
        return view('test.form');
    }
    public function createForm()
    {
        return view('test.form');
    }
    public function formStore(Request $request)
    {
        // Validate incoming request data for city, locality, builder, project, floor, amenity, and project detail creation
        $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'localities' => 'required|array',
            'localities.*.name' => 'required|string|max:255',
            'localities.*.description' => 'nullable|string|max:1000',
            'localities.*.landmarks' => 'required|array',
            'localities.*.landmarks.*.name' => 'nullable|string|max:255',
            'localities.*.landmarks.*.description' => 'nullable|string|max:1000',

            // Validation for builder
            'builder_name' => 'required|string|max:255',
            'builder_contact_info' => 'nullable|string|max:255',
            'builder_established_year' => 'nullable|integer',
            'builder_description' => 'nullable|string|max:1000',
            'builder_website' => 'nullable|string|max:255',


            // Validation for floors
            'localities.*.projects.*.floors' => 'required|array', // Expecting an array of floors for each project
            'localities.*.projects.*.floors.*.floor_section' => 'nullable|string|max:255',
            'localities.*.projects.*.floors.*.floor_segment_1' => 'nullable|string|max:255',
            'localities.*.projects.*.floors.*.segment_price_1' => 'nullable|numeric',
            'localities.*.projects.*.floors.*.segment_sqft_1' => 'nullable|numeric',
            'localities.*.projects.*.floors.*.segment_emi_1' => 'nullable|numeric',
            'localities.*.projects.*.floors.*.segment_floor_image_1' => 'nullable|string|max:255', // Assuming this is a URL or path to an image



            // Validation for projects
            'localities.*.projects' => 'required|array', // Expecting an array of projects for each locality
            'localities.*.projects.*.project_name' => 'required|string|max:255',
            'localities.*.projects.*.price_range' => 'required|string|max:255', // e.g., "₹37.5 L - ₹52.0 L"
            'localities.*.projects.*.bhk_configurations' => 'required|string|max:255', // e.g., "1 BHK, 2 BHK"
            'localities.*.projects.*.carpet_area_range' => 'required|string|max:255', // e.g., "407 sq.ft - 550 sq.ft"
            'localities.*.projects.*.rera_registration' => 'nullable|string|max:255',
            'localities.*.projects.*.possession_date' => 'nullable|date',


            // Validation for project details
            'localities.*.projects.*.project_details' => 'nullable|array', // Expecting an array of project details for each project
            'localities.*.projects.*.project_details.*.project_specification' => 'nullable|string',
            'localities.*.projects.*.project_details.*.locality_advantage' => 'nullable|string',
            'localities.*.projects.*.project_details.*.review' => 'nullable|string',
            // Image upload validation
            'localities.*.projects.*.project_details.*.image_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],

            // Validation for amenities
            'localities.*.projects.*.amenities' => 'required|array', // Expecting an array of amenities for each project
            'localities.*.projects.*.amenities.*.amenity_name' => 'required|string|max:255', // Not Null
            'localities.*.projects.*.amenities.*.description' => 'nullable|string|max:1000', // Optional description

        ]);

        // Create city and save it to database
        $city = City::create($request->only(['name', 'state', 'country']));
        // Create the builder
        $builder = Builder::create([
            'name' => $request->builder_name,
            'contact_info' => $request->builder_contact_info,
            'established_year' => $request->builder_established_year,
            'description' => $request->builder_description,
            'website' => $request->builder_website,
        ]);

        // Create localities and associated landmarks and projects
        foreach ($request->localities as $localityData) {

            $locality = Locality::create([
                'city_id' => $city->id,
                'name' => $localityData['name'],
                'description' => $localityData['description'],
            ]);

            // Create landmarks for each locality if provided
            if (isset($localityData['landmarks'])) {
                foreach ($localityData['landmarks'] as $landmarkData) {
                    Landmark::create([
                        'locality_id' => $locality->id,
                        'name' => $landmarkData['name'],
                        'description' => $landmarkData['description'],
                    ]);
                }
            }

            // Create projects for each locality if provided
            if (isset($localityData['projects'])) {
                foreach ($localityData['projects'] as $projectData) {
                    $projectData['builder_id'] = $builder->id; // Associate with the created builder
                    $projectData['locality_id'] = $locality->id; // Associate with the created locality

                    // Create the project
                    $project = Project::create($projectData);

                    // Create project details if provided
                    if (isset($projectData['project_details'])) {
                        foreach ($projectData['project_details'] as $detailData) {
                            $detailData['project_id'] = $project->id; // Associate with the created project
                            $project->projectDetail()->create($detailData); // Save project detail (assuming you have a relationship defined)
                        }
                    }
                }
            }
        }



        return redirect()->route('form.index')->with('success', 'Form Added Successfully');
    }

    //############################## city-locality-store
    public function cityLocalityIndex()
    {
      
        return view('test.cityLocalityIndex');
    }
    public function cityLocalityCreate()
    {
        return view('test.cityLocality');
    }
    public function cityLocalityStore(Request $request)
    {
        // Validate incoming request data for city, locality, builder, project, floor, amenity, and project detail creation
        $request->validate([
            'city_name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',

            'localities' => 'required|array',
            'localities.*.name' => 'required|string|max:255',
            'localities.*.description' => 'nullable|string|max:1000',
            'localities.*.landmarks' => 'nullable|array',
            'localities.*.landmarks.*.name' => 'required|string|max:255',
            'localities.*.landmarks.*.description' => 'nullable|string|max:1000',

            // Validation for builder
            'builder_name' => 'required|string|max:255',
            'builder_contact_info' => 'nullable|string|max:255',
            'builder_established_year' => 'nullable|integer',
            'builder_description' => 'nullable|string|max:1000',
            'builder_website' => 'nullable|string|max:255',

            // Validation for projects
            'localities.*.projects' => 'nullable|array', // Allow projects to be optional
            'localities.*.projects.*.project_name' => 'required|string|max:255',
            'localities.*.projects.*.price_range' => 'required|string|max:255', // e.g., "₹37.5 L - ₹52.0 L"
            'localities.*.projects.*.bhk_configurations' => 'required|string|max:255', // e.g., "1 BHK, 2 BHK"
            'localities.*.projects.*.carpet_area_range' => 'required|string|max:255', // e.g., "407 sq.ft - 550 sq.ft"
            'localities.*.projects.*.rera_registration' => 'nullable|string|max:255',
            'localities.*.projects.*.possession_date' => 'nullable|date',

            // Validation for project details
            'localities.*.projects.*.project_details' => 'nullable|array', // Expecting an array of project details for each project
            'localities.*.projects.*.project_details.*.project_specification' => 'nullable|string',
            'localities.*.projects.*.project_details.*.locality_advantage' => 'nullable|string',
            'localities.*.projects.*.project_details.*.review' => 'nullable|string',
            // Image upload validation
            'localities.*.projects.*.project_details.*.image_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create the city
            $city = City::create([
                'name' => $request->city_name,
                'state' => $request->state,
                'country' => $request->country,
            ]);

            // Create the builder
            $builder = Builder::create([
                'name' => $request->builder_name,
                'contact_info' => $request->builder_contact_info,
                'established_year' => $request->builder_established_year,
                'description' => $request->builder_description,
                'website' => $request->builder_website,
            ]);

            // Create localities and associated landmarks and projects
            foreach ($request->localities as $localityData) {

                $locality = Locality::create([
                    'city_id' => $city->id,
                    'name' => $localityData['name'],
                    'description' => $localityData['description'],
                ]);

                // Create landmarks for each locality if provided
                if (isset($localityData['landmarks'])) {
                    foreach ($localityData['landmarks'] as $landmarkData) {
                        Landmark::create([
                            'locality_id' => $locality->id,
                            'name' => $landmarkData['name'],
                            'description' => $landmarkData['description'],
                        ]);
                    }
                }

                // Create projects for each locality if provided
                if (isset($localityData['projects'])) {
                    foreach ($localityData['projects'] as $projectData) {
                        $projectData['builder_id'] = $builder->id; // Associate with the created builder
                        $projectData['locality_id'] = $locality->id; // Associate with the created locality

                        // Create the project
                        $project = Project::create($projectData);

                        // Create project details if provided
                        if (isset($projectData['project_details'])) {
                            foreach ($projectData['project_details'] as $detailData) {
                                // Handle image upload
                                if (isset($detailData['image_path']) && $detailData['image_path'] instanceof \Illuminate\Http\UploadedFile) {
                                    // Generate a unique filename
                                    $imageName = uniqid() . '.' . $detailData['image_path']->getClientOriginalExtension();

                                    // Move the file to public/images directory
                                    $imagePath = $detailData['image_path']->move(public_path('images'), $imageName);

                                    // Store only the filename in the database
                                    $detailData['image_path'] = $imageName;
                                }

                                $detailData['project_id'] = $project->id;
                                $project->projectDetail()->create($detailData);
                            }
                        }
                    }
                }
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('cityLocality.create')->with(
                'success',
                'City, localities, landmarks, builder, and projects created successfully.'
            );
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating city, localities, landmarks, builder, and projects: ' . $e->getMessage());
            return redirect()->back()->with(
                'error',
                'Failed to create city, localities, landmarks, builder, and projects. Please try again.'
            );
        }
    }
}
