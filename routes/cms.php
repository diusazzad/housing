<?php

use App\Http\Controllers\Admin\cmsController;
use Illuminate\Support\Facades\Route;



Route::controller( cmsController::class)->group(function () {
    Route::get('cms/form', 'form')->name('form.create');
    Route::post('cms/form', 'form')->name('form.store');
});
