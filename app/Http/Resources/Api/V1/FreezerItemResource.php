<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property int $id
 * @property string $size
 * @property int $final_price
 * @property int $freezer_id
 * @property string $expired_at
 */
class FreezerItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    #[ArrayShape([
        'id' => "int",
        'size' => "double",
        'final_price' => "int",
        'freezer_id' => "int",
        'freezer' => "\App\Http\Resources\Api\V1\FreezerResource",
        'expired_at' => "string"
    ])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'size' => (double) $this->size,
            'final_price' => $this->final_price,
            'freezer_id' => $this->freezer_id,
            'freezer' => (new FreezerResource($this->whenLoaded('freezer'))),
            'expired_at' => $this->expired_at
        ];
    }
}
