<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Landmark extends Model
{
    use HasFactory;

    protected $fillable = ['locality_id', 'name', 'description'];

    /**
     * Get the user that owns the Landmark
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class);
    }
}
