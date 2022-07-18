<?php

namespace Database\Seeders\models;

use App\Models\LocationCountry;
use Illuminate\Database\Seeder;

class LocationCountrySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        LocationCountry::factory()
            ->count(5)
            ->create();
    }
}
