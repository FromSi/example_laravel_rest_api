<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\FreezerItemCollection;
use App\Http\Resources\Api\V1\FreezerItemResource;
use App\Models\FreezerItem;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class FreezerItemController extends Controller
{
    public function __construct(
        protected FreezerItem $freezerItem
    )
    {
        // Здесь могла быть ваша реклама
    }

    /**
     * Display a listing of the resource.
     *
     * @return FreezerItemCollection
     */
    public function index(): FreezerItemCollection
    {
        $freezerItems = QueryBuilder::for($this->freezerItem)
            ->allowedFilters([
                'id',
                'size',
                'freezer_id',
                'final_price',
                'expired_at'
            ])
            ->allowedSorts([
                'id',
                'size',
                'freezer_id',
                'final_price',
                'expired_at'
            ])
            ->paginate($this->getApiPaginate());

        return new FreezerItemCollection($freezerItems);
    }

    /**
     * Display the specified resource.
     *
     * @param int $freezerItemId
     * @return FreezerItemResource
     */
    public function show(int $freezerItemId): FreezerItemResource
    {
        $freezerItem = QueryBuilder::for($this->freezerItem)
            ->allowedIncludes('freezer')
            ->findOrFail($freezerItemId);

        return new FreezerItemResource($freezerItem);
    }
}
