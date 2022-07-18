<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FreezerItem extends Model
{
    use HasFactory;

    /**
     * Связь с @see Freezer::class
     *
     * @return BelongsTo
     */
    public function freezer(): BelongsTo
    {
        return $this->belongsTo(Freezer::class);
    }
}
