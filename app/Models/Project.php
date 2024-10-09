<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'locality_id',
        'builder_id',
        'project_name',
        'developer',
        'address',
        'pricing',
        'avg_price',
        'emi_starts',
        'rera_status',
        'contact_seller',
        'configuration',
        'possession_starts',
        'carpet_area',
        'why_to_choose',
        'around_this_project',
        'segments',
        'overview',
        'size',
        'project_size',
        'launched_date',
        'rera_id',
        'more_about_project'
    ];

        


}