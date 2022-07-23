<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\FreezerCollection;
use App\Http\Resources\Api\V1\FreezerResource;
use App\Models\Freezer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class FreezerController extends Controller
{
    public function __construct(
        protected Freezer $freezer
    )
    {
        // Здесь могла быть ваша реклама
    }

    /**
     * Display a listing of the resource.
     *
     * @return FreezerCollection
     */
    public function index(): FreezerCollection
    {
        $freezers = QueryBuilder::for($this->freezer)
            ->allowedFilters([
                'id',
                'temperature',
                'size',
                'price',
                AllowedFilter::exact('city_id', 'location_city_id')
            ])
            ->allowedSorts([
                'id',
                'temperature',
                'size',
                'price',
                AllowedSort::field('city_id', 'location_city_id')
            ])
            ->withCount('freezerItems')
            ->paginate($this->getApiPaginate());

        return new FreezerCollection($freezers);
    }

    /**
     * Display the specified resource.
     *
     * @param int $freezerId
     * @return FreezerResource
     */
    public function show(int $freezerId): FreezerResource
    {
        $freezer = QueryBuilder::for($this->freezer)
            ->allowedIncludes('city')
            ->withCount('freezerItems')
            ->findOrFail($freezerId);

        return new FreezerResource($freezer);
    }
}
