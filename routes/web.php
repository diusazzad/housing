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
    Route::get('/project-retrive', 'projectData');

    // Route::get('/', 'accordion');
});

Route::prefix('upload')->controller(FileUploadController::class)->group(function () {
    Route::get('/city', 'cities');
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
