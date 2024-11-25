<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageTestModel extends Model
{
    use HasFactory;
    protected $table='image_test_models';
    
    protected $fillable=[
        'name',
        'mime_type',
        'image_data'
    ];
}
