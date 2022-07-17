<?php

namespace Database\Factories;

use App\Models\LocationCountry;
use App\Services\Interfaces\LocationCountryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LocationCity>
 */
class LocationCityFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $locationCountryService = App::make(LocationCountryService::class);
        $locationCountry = $locationCountryService->getRandomLocationCountry();

        return [
            'name' => "{$this->faker->city} ({$locationCountry->name})",
            'location_country_id' => $locationCountry
        ];
    }
}
