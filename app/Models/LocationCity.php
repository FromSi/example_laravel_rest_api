<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method paginate(int $getApiPaginate)
 * @method findOrFail(int $locationCityId)
 */
class LocationCity extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Связь с @see LocationCountry::class
     *
     * @return BelongsTo
     */
    public function locationCountry(): BelongsTo
    {
        return $this->belongsTo(LocationCountry::class);
    }

    /**
     * Связь с @see Freezer::class
     *
     * @return HasMany
     */
    public function freezers(): HasMany
    {
        return $this->hasMany(Freezer::class);
    }

    /**
     * Связь с @see LocationCountry::class
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(LocationCountry::class, 'location_country_id');
    }
}
