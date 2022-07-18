<?php

namespace Database\Factories;

use App\Models\LocationCity;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Freezer>
 */
class FreezerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape([
        'temperature' => "int",
        'size' => "int",
        'price' => "int",
        'location_city_id' => "mixed"
    ])]
    public function definition(): array
    {
        return [
            'temperature' => $this->faker->numberBetween(30, -30),
            'size' => $this->faker->numberBetween(2, 10),
            'price' => $this->faker->numberBetween(100, 200),
            'location_city_id' => LocationCity::factory()
        ];
    }
}
