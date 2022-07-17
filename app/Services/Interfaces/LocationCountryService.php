<?php

namespace App\Services\Interfaces;

use App\Models\LocationCountry;
use Illuminate\Database\Eloquent\Collection;

interface LocationCountryService
{
    /**
     * Получить случайную страну
     *
     * @return LocationCountry
     */
    public function getRandomLocationCountry(): LocationCountry;

    /**
     * Получить все страны
     *
     * @return Collection
     */
    public function getLocationCountries(): Collection;
}
