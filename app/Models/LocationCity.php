<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
