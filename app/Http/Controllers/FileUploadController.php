<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function cities()
    {
        return view('upload.cities');
    }
}
