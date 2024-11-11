<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\LandingPage;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::controller(LandingPage::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/city-retrive', 'retriveCitiesData');
    Route::get('/city-locality-retrive', 'ctl');
    Route::get('/city-locality-landmark-retrive', 'retriveLandmarkCitiesData');
    Route::get('/builder-retrive', 'builderData');
    Route::get('/project-retrive', 'retrieveProjectsWithLocalities');
    Route::get('/project-city-retrive', 'retrieveProjectsWithCityName');
    Route::get('/projectdetail-project-retrive', 'retrieveProjectsWithProjectDetail');

    // Route::get('/', 'accordion');
});

Route::controller(FileUploadController::class)->group(function () {
    Route::get('/cities/create', 'createCities')->name('cities.create');
    Route::post('/cities', 'storeCity')->name('cities.store');
    // Routes for Localities
    Route::get('/localities/create', 'createLocalities')->name('localities.create');
    Route::post('/localities', 'storeLocality')->name('localities.store');
    // Routes for Landmarks
    Route::get('/landmarks/create', 'createLandmarks')->name('landmarks.create');
    Route::post('/landmarks', 'storeLandmarks')->name('landmarks.store');
    // Routes for Builders
    Route::get('/builders/create', 'createBuilders')->name(name: 'builders.create');
    Route::post('/builders', 'storeBuilders')->name('builders.store');
    // Routes for Projects
    Route::get('/projects/create', 'createProjects')->name('projects.create');
    Route::post('/projects', 'storeProjects')->name('projects.store');
    // Routes for Amenities 
    Route::get('/amenities/create', 'createAmenities')->name('amenities.create');
    Route::post('/amenities', 'storeAmenities')->name('amenities.store');
    // Routes for Project Details
    Route::get('/projectdetails/create', 'createProjectDetails')->name('projectdetails.create');
    Route::post('/projectdetails', 'storeProjectDetails')->name('projectdetails.store');
    // Route for Floor Plan
    // Route::get('/floorplan/create', 'createFloorPlan')->name('floor_plan.create');
    // Route::post('/floorplan', 'storeFloorPlan')->name('floor_plan.store');
    // Route for Markets
    // Route::get('/markets/create', 'createMarkets')->name('markets.create');
    // Route::post('/markets', 'storeMarkets')->name('markets.store');

    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
