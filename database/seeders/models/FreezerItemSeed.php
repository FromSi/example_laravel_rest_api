<?php

namespace Database\Seeders\models;

use App\Models\FreezerItem;
use App\Services\Interfaces\FreezerService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class FreezerItemSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $freezerService = App::make(FreezerService::class);
        $freezers = $freezerService->getFreezers();

        foreach ($freezers as $freezer) {
            FreezerItem::factory()
                ->count(rand(0, 5))
                ->create([
                    'freezer_id' => $freezer
                ]);
        }
    }
}
