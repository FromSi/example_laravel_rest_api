<?php

namespace Database\Seeders;

use Database\Seeders\models\FreezerItemSeed;
use Database\Seeders\models\FreezerSeed;
use Database\Seeders\models\LocationCitySeed;
use Database\Seeders\models\LocationCountrySeed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(LocationCountrySeed::class);
        $this->call(LocationCitySeed::class);
        $this->call(FreezerSeed::class);
        $this->call(FreezerItemSeed::class);
    }
}
