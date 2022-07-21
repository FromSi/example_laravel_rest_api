<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\LocationCityCollection;
use App\Http\Resources\Api\V1\LocationCityResource;
use App\Models\LocationCity;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class LocationCityController extends Controller
{
    public function __construct(
        protected LocationCity $locationCity
    )
    {
        // Здесь могла быть ваша реклама
    }

    /**
     * Display a listing of the resource.
     *
     * @return LocationCityCollection
     */
    public function index(): LocationCityCollection
    {
        $locationCities = QueryBuilder::for($this->locationCity)
            ->allowedFilters([
                'id',
                'name',
                AllowedFilter::exact('country_id', 'location_country_id')
            ])->allowedSorts([
                'id',
                'name',
                AllowedSort::field( 'country_id', 'location_country_id')
            ])->paginate($this->getApiPaginate());

        return new LocationCityCollection($locationCities);
    }

    /**
     * Display the specified resource.
     *
     * @param int $locationCityId
     * @return LocationCityResource
     */
    public function show(int $locationCityId): LocationCityResource
    {
        $locationCity = QueryBuilder::for($this->locationCity)
            ->allowedIncludes('country')
            ->findOrFail($locationCityId);

        return new LocationCityResource($locationCity);
    }
}
