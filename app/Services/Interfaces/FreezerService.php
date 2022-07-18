<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface FreezerService
{
    /**
     * Получить все холодильники
     *
     * @return Collection
     */
    public function getFreezers(): Collection;
}
