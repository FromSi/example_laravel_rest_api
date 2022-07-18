<?php

namespace App\Services\Interfaces;

use App\Models\LocationCity;
use Illuminate\Database\Eloquent\Collection;

interface LocationCityService
{

    /**
     * Получить все города
     *
     * @return Collection
     */
    public function getLocationCities(): Collection;
}
