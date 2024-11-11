<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Models\Amenity;
use App\Models\Builder;
use App\Models\City;
use App\Models\ImageTestModel;
use App\Models\Landmark;
use App\Models\Locality;
use App\Models\Project;
use App\Models\ProjectDetail;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FileUploadController extends Controller
{
    public function createCities()
    {
        $cities = City::all();
        return view('upload.cities', compact('cities'));
    }
    public function storeCity(Request $request)
    {
        $request->validate([
            'name' => 'required|string| max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255'
        ]);
        City::create($request->all());
        return redirect()->route('cities.create')->with('success', 'City added successfully');
    }

    public function createLocalities()
    {
        $cities = City::all();
        $localities = Locality::all();
        return view('upload.localities', compact('cities', 'localities'));
    }
    public function storeLocality(StoreFormRequest $request)
    {
        Locality::create($request->all());
        return redirect()->route('localities.create')->with('success', 'Locality added successfully');
    }
    public function createLandmarks()
    {
        $localities = Locality::all(); // Fetch all localities for the dropdown
        $landmarks = Landmark::with('locality')->get(); // Fetch all landmarks with their locality
        return view('upload.landmarks', compact('localities', 'landmarks'));
    }

    public function storeLandmarks(StoreFormRequest $request)
    {
        Landmark::create($request->validated());;
        return redirect()->route('landmarks.create')->with('success', 'Landmark added successfully');
    }
    // public function createLandmarks(){
    //     $localities = Locality::all();
    //     $landmarks = Landmark::all();
    //     return view('upload.landmarks', compact('localities', 'landmarks'));
    // }
    // public function storeLandmarks(Request $request){
    //     $request->validate([
    //         'locality_id' => 'required|exists:localities,id',
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //     ]);
    //     Landmark::create($request->all());
    //     return redirect()->route('landmarks.create')->with('success', 'Landmark added successfully');
    // }

    public function createBuilders()
    {
        $builders = Builder::all();
        return view('upload.builders', compact('builders'));
    }
    public function storeBuilders(StoreFormRequest $request)
    {
        Builder::create($request->validated());
        return redirect()->route('builders.create')->with('success', 'Builder added successfully');
    }

    public function createProjects()
    {
        $localities = Locality::all(); // Fetch all localities for the dropdown
        $builders = Builder::all(); // Fetch all builders for the dropdown
        $projects = Project::with('locality', 'builder')->get(); // Fetch all projects with their locality and builder
        return view('upload.projects', compact('localities', 'builders', 'projects'));
    }
    public function storeProjects(StoreFormRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.create')->with('success', 'Project added successfully');
    }
    public function createAmenities()
    {
        $projects = Project::all();
        $amenities = Amenity::with('project')->get();
        return view('upload.amenities', compact('projects', 'amenities'));
    }
    public function storeAmenities(StoreFormRequest $request)
    {
        Amenity::create($request->validated());
        return redirect()->route('amenities.create')->with('success', 'Amenity added successfully');
    }
    public function createProjectDetails()
    {
    $projects = Project::all();
    // Load existing project details
    $projectDetails = ProjectDetail::with('project')->get();
    return view('upload.projectdetails', compact('projects', 'projectDetails'));
    }
    public function storeProjectDetails(StoreFormRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('project_images', 'public');
            $validatedData['image_path'] = $imagePath;
        }
        ProjectDetail::create($validatedData);
        return redirect()->route('projectdetails.create')->with('success', 'Project detail added successfully.');
    }
}
