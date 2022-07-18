<?php

namespace Database\Factories;

use App\Models\Freezer;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FreezerItem>
 */
class FreezerItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape([
        'size' => "float",
        'freezer_id' => "mixed",
        'final_price' => "int",
        'expired_at' => "string"
    ])]
    public function definition(): array
    {
        return [
            'size' => $this->faker->numberBetween(1, 9) / pow(10, $this->faker->numberBetween(2, 6)),
            'freezer_id' => Freezer::factory(),
            'final_price' => $this->faker->numberBetween(500, 10_000),
            'expired_at' => $this->faker->dateTimeBetween('-7 days', '+24 days')
        ];
    }
}
