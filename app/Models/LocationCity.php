<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationCity extends Model
{
    use HasFactory;

    /**
     * Связь с @see LocationCountry::class
     *
     * @return BelongsTo
     */
    public function locationCountry(): BelongsTo
    {
        return $this->belongsTo(LocationCountry::class);
    }
}
