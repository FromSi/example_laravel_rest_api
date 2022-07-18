<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Freezer extends Model
{
    use HasFactory;

    /**
     * Связь с @see LocationCity::class
     *
     * @return BelongsTo
     */
    public function locationCity(): BelongsTo
    {
        return $this->belongsTo(LocationCity::class);
    }

    /**
     * Связь с @see FreezerItem::class
     *
     * @return HasMany
     */
    public function freezerItems(): HasMany
    {
        return $this->hasMany(FreezerItem::class);
    }
}
