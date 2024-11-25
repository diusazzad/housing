<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class);
    }

    public function builder(): BelongsTo
    {
        return $this->belongsTo(Builder::class);
    }


    public function projectDetail(): HasOne
    {
        return $this->hasOne(ProjectDetail::class);
    }

    public function amenities(): HasOne
    {
        return $this->hasOne(Amenity::class);
    }

}
