<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static paginate(int $int)
 * @method findOrFail(int $locationCountryId)
 */
class LocationCountry extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

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
