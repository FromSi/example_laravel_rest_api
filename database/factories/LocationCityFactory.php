<?php

namespace Database\Factories;

use App\Models\LocationCountry;
use App\Services\Interfaces\LocationCountryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use JetBrains\PhpStorm\ArrayShape;

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
    #[ArrayShape([
        'name' => "string",
        'location_country_id' => "mixed"
    ])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'location_country_id' => LocationCountry::factory()
        ];
    }
}
