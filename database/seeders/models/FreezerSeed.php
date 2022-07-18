<?php

namespace Database\Seeders\models;

use App\Models\Freezer;
use App\Services\Interfaces\LocationCityService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class FreezerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $locationCityService = App::make(LocationCityService::class);
        $locationCities = $locationCityService->getLocationCities();

        foreach ($locationCities as $locationCity) {
            for ($i = -30; $i <= 30; $i++) {
                Freezer::factory()
                    ->create([
                        'temperature' => $i,
                        'location_city_id' => $locationCity
                    ]);
            }
        }
    }
}
