<?php

namespace Database\Seeders;

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
    public function run()
    {
        $this->call(LocationCountrySeed::class);
        $this->call(LocationCitySeed::class);
    }
}
