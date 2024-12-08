<?php

use App\Http\Controllers\Admin\cmsController;
use App\Http\Controllers\Admin\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TestController::class, 'testIndex'])->name('test.index');

