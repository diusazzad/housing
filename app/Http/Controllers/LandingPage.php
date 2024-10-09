<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

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
        $cities = City::with('landmarks')->get();

        // Return the data as JSON or pass it to a view
        return response()->json($cities);
    }

    //  accordion 
    // public function accordion()
    // {
    //     $cities = City::with('localities')->get();
    //     return view('welcome', compact('cities'));
    // }
}
