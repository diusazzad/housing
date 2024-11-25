<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'project_specification',
        'locality_advantage',
        'review',
        'project_brochure',
        'project_payment_plan',
        'project_offer',
        'image_path',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
