<?php

use App\Http\Controllers\Admin\cmsController;
use Illuminate\Support\Facades\Route;



Route::controller(cmsController::class)->group(function () {
    Route::get('cms', 'cmsIndex')->name('cms.index');
    Route::get('cms/create', 'cmsCreate')->name('cms.create');
    Route::post('cms/', 'cmsStore')->name('cms.store');
});


