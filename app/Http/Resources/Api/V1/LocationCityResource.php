<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property int $id
 * @property string $name
 * @property int $location_country_id
 */
class LocationCityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    #[ArrayShape([
        'id' => "int",
        'name' => "string",
        'country_id' => "int",
        'country' => "\App\Http\Resources\Api\V1\LocationCountryResource"
    ])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country_id' => $this->location_country_id,
            'country' => (new LocationCountryResource($this->whenLoaded('locationCountry')))
        ];
    }
}
