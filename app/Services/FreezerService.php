<?php

namespace App\Services;

use App\Models\Freezer;
use Illuminate\Database\Eloquent\Collection;

class FreezerService implements Interfaces\FreezerService
{

    /**
     * @inheritDoc
     */
    public function getFreezers(): Collection
    {
        return Freezer::all();
    }
}
