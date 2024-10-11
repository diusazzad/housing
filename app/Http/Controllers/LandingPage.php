<?php

namespace App\Http\Controllers;

use App\Models\Builder;
use App\Models\City;
use App\Models\Project;
use App\Models\ProjectDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandingPage extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function retriveCitiesData()
    {
        $cites = City::all();
        return response()->json($cites);
    }
    public function ctl()
    {
        $clds = City::with('localities')->get();
        return response()->json($clds);
    }

    public function retriveLandmarkCitiesData()
    {
        $cities = City::with('localities.landmarks')->get();

        // Return the data as JSON or pass it to a view
        return response()->json($cities);
    }
    public function builderData()
    {
        $builders = Builder::all();
        return response()->json($builders);
    }
    public function retrieveProjectsWithLocalities()
    {
        $projects = Project::with(['locality.city'])->get();

        return response()->json($projects);
    }


    public function retrieveProjectsWithCityName(): JsonResponse
    {
        try {
            // Eager load localities and cities
            $projects = Project::with(['locality.city'])->get();

            // Transform the data to include project name and city name
            $result = $projects->map(function (Project $project) {
                return [
                    'project_name' => $project->project_name,
                    'city_name' => optional($project->locality->city)->name, // Use optional to avoid null errors
                ];
            });

            return response()->json($result);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Error retrieving projects with city names: ' . $e->getMessage());

            // Return a JSON response with an error message
            return response()->json([
                'error' => 'Unable to retrieve projects at this time. Please try again later.'
            ], 500); // 500 Internal Server Error
        }
    }

    public function retrieveProjectsWithProjectDetail()
    {
        // $projectDetail = ProjectDetail::with('project_id')->get();
        $projectDetail = ProjectDetail::all();
        return response($projectDetail);
    }
}
