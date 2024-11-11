<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'locality_id',
        'builder_id',
        'project_name',
        'price_range',
        'bhk_configurations',
        'carpet_area_range',
        'rera_registration',
        'possession_date',
    ];

    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class);
    }

    public function builder(): BelongsTo
    {
        return $this->belongsTo(Builder::class);
    }

    public function project_detail(): HasMany
    {
        return $this->hasMany(ProjectDetail::class);
    }

    public function amenities(): HasMany
    {
        return $this->hasMany(Amenity::class);
    }
}
