<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property int $id
 * @property string $name
 * @property int $location_cities_count
 */
class LocationCountryResource extends JsonResource
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
        'city_count' => "int"
    ])]
    public function toArray($request): array
    {
        $resource = [
            'id' => $this->id,
            'name' => $this->name
        ];

        if ($this->location_cities_count) {
            $resource['city_count'] = $this->location_cities_count;
        }

        return $resource;
    }
}
