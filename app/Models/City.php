<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'state', 'country'];

    /**
     * Get all of the comments for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class);
    }
    public function builders(): HasMany
    {
        return $this->hasMany(Builder::class);
    }
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
