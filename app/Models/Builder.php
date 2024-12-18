<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Builder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_info', 'established_year', 'description', 'website'];

    /**
     * Get all of the comments for the Builder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
