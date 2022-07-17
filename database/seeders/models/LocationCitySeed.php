<?php

namespace Database\Seeders\models;

use App\Models\LocationCity;
use App\Models\LocationCountry;
use App\Services\Interfaces\LocationCountryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\App;

class LocationCitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locationCountryService = App::make(LocationCountryService::class);
        $locationCountries = $locationCountryService->getLocationCountries();

        foreach ($locationCountries as $locationCountry) {
            for ($i = 0; $i < 2; $i++){
                $faker = Faker::create();

                LocationCity::factory()
                    ->create([
                        'name' => $faker->city . " ({$locationCountry->name})",
                        'location_country_id' => $locationCountry
                    ]);
            }
        }
    }
}
