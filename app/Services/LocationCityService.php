<?php

namespace App\Services;

use App\Models\LocationCity;
use Illuminate\Database\Eloquent\Collection;

class LocationCityService implements Interfaces\LocationCityService
{

    /**
     * @inheritDoc
     */
    public function getLocationCities(): Collection
    {
        return LocationCity::all();
    }
}
