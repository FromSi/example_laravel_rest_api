<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LocationCountry extends Model
{
    use HasFactory;

    /**
     * Связь с @see LocationCity::class
     *
     * @return HasMany
     */
    public function locationCities(): HasMany
    {
        return $this->hasMany(LocationCity::class);
    }
}
