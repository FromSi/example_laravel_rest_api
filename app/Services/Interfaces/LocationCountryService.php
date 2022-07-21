<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface LocationCountryService
{

    /**
     * Получить все страны
     *
     * @return Collection
     */
    public function getLocationCountries(): Collection;
}
