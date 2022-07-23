<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property int $id
 * @property int $temperature
 * @property int $size
 * @property int $price
 * @property int $location_city_id
 * @property int $freezer_items_count
 */
class FreezerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    #[ArrayShape([
        'id' => "int",
        'temperature' => "int",
        'size' => "int",
        'price' => "int",
        'city_id' => "int",
        'city' => "\App\Http\Resources\Api\V1\LocationCityResource",
        'freezer_item_count' => "int"
    ])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'temperature' => $this->temperature,
            'size' => $this->size,
            'price' => $this->price,
            'city_id' => $this->location_city_id,
            'city' => (new LocationCityResource($this->whenLoaded('city'))),
            'freezer_item_count' => $this->freezer_items_count ?? 0
        ];
    }
}
