<?php

use App\Http\Controllers\Admin\cmsController;
use App\Http\Controllers\Admin\TestController;
use Illuminate\Support\Facades\Route;



Route::prefix('/test')->controller(TestController::class)->group(function () {
    // image Test
    // Route::get('/images/create',  'index')->name('images.store');
    // Route::post('/images', 'store')->name('images.store');

    // Form Data
    Route::get('/form/index', 'createIndex')->name('form.index');
    Route::get('/form/create', 'createForm')->name('form.create');
    Route::post('/form/index', 'createForm')->name('form.store');
    // city locality store
    Route::get('/citylocality/index', 'cityLocalityIndex')->name('citylocality.index');
    Route::get('/citylocality/create', 'cityLocalityCreate')->name('cityLocality.create');
    Route::post('/citylocality/create', 'cityLocalityStore')->name('cityLocality.store');
    Route::get('/citylocality/{city}/edit', 'cityLocalityEdit')->name('cityLocality.edit');
    Route::put('/citylocality/{city}', 'cityLocalityUpdate')->name('cityLocality.update');
    Route::delete('/citylocality/{city}', 'cityLocalityDestroy')->name('cityLocality.destroy');
});
