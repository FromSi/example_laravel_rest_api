<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\LocationCountryCollection;
use App\Http\Resources\Api\V1\LocationCountryResource;
use App\Models\LocationCountry;
use Spatie\QueryBuilder\QueryBuilder;

class LocationCountryController extends Controller
{
    public function __construct(
        protected LocationCountry $locationCountry
    )
    {
        // Здесь могла быть ваша реклама
    }

    /**
     * Display a listing of the resource.
     *
     * @return LocationCountryCollection
     */
    public function index(): LocationCountryCollection
    {
        $locationCountries = QueryBuilder::for($this->locationCountry)
            ->allowedFilters([
                'id',
                'name'
            ])
            ->allowedSorts([
                'id',
                'name'
            ])
            ->withCount('locationCities')
            ->paginate($this->getApiPaginate());

        return new LocationCountryCollection($locationCountries);
    }

    /**
     * Display the specified resource.
     *
     * @param int $locationCountryId
     * @return LocationCountryResource
     */
    public function show(int $locationCountryId): LocationCountryResource
    {
        $locationCountry = QueryBuilder::for($this->locationCountry)
            ->withCount('locationCities')
            ->findOrFail($locationCountryId);

        return new LocationCountryResource($locationCountry);
    }
}
