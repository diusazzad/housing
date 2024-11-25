<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Builder;
use App\Models\City;
use App\Models\Floor;
use App\Models\Landmark;
use App\Models\Locality;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class cmsController extends Controller
{
    public function cmsIndex()
    {
        try {
            // Fetch all cities with their localities, landmarks, projects, project details, and builders
            $cities = City::with(['localities.landmarks', 'localities.projects.projectDetail', 'localities.projects.builder','localities.projects.amenities'])->get();
    
            // Transform the data into a structured format
            $data = $cities->map(function ($city) {
                return [
                    'name' => $city->name,
                    'state' => $city->state,
                    'country' => $city->country,
                    'localities' => $city->localities->map(function ($locality) {
                        return [
                            'name' => $locality->name,
                            'description' => $locality->description,
                            'landmarks' => $locality->landmarks->map(function ($landmark) {
                                return [
                                    'name' => $landmark->name,
                                    'description' => $landmark->description,
                                ];
                            }),
                            'projects' => $locality->projects->map(function ($project) {
                                return [
                                    'project_name' => $project->project_name,
                                    'price_range' => $project->price_range,
                                    'bhk_configurations' => $project->bhk_configurations,
                                    'carpet_area_range' => $project->carpet_area_range,
                                    'rera_registration' => $project->rera_registration,
                                    'possession_date' => $project->possession_date,
                                    'builder' => [
                                        'name' => $project->builder->name,
                                        'contact_info' => $project->builder->contact_info,
                                        'established_year' => $project->builder->established_year,
                                        'description' => $project->builder->description,
                                        'website' => $project->builder->website,
                                    ],
                                    'project_detail' => $project->projectDetail ? [
                                        'project_specification' => $project->projectDetail->project_specification,
                                        'locality_advantage' => $project->projectDetail->locality_advantage,
                                        'review' => $project->projectDetail->review,
                                        'project_brochure' => $project->projectDetail->project_brochure,
                                        'project_payment_plan' => $project->projectDetail->project_payment_plan,
                                        'project_offer' => $project->projectDetail->project_offer,
                                        'image_path' => $project->projectDetail->image_path,
                                    ] : null,
                                    'amenities' => $project->amenities ? [
                                        'amenity_name' => $project->amenities->amenity_name,
                                        'description' => $project->amenities->description,
                                    ] : null,
                                ];
                            }),
                        ];
                    }),
                ];
            });
    
            return response()->json([
                'success' => true,
                'data' => $data,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function cmsCreate()
    {
        $cities = City::all();
        return view('upload.form', compact('cities','localites','ent'));
    }
    public function cmsStore(Request $request){
        $request->validate([
            'name' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        return redirect()->route('form.create')->with('success', 'City Added Successfully');
    }
}
