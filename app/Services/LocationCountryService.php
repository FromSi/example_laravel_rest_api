<?php

namespace App\Services;

use App\Models\LocationCountry;
use Illuminate\Database\Eloquent\Collection;

class LocationCountryService implements Interfaces\LocationCountryService
{

    /**
     * @inheritDoc
     */
    public function getLocationCountries(): Collection
    {
        return LocationCountry::all();
    }
}
