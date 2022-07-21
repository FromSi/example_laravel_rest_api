<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\LocationCityCollection;
use App\Http\Resources\Api\V1\LocationCityResource;
use App\Models\LocationCity;

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
        $locationCities = $this->locationCity->paginate($this->getApiPaginate());

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
        $locationCity = $this->locationCity
            ->with('locationCountry')
            ->findOrFail($locationCityId);

        return new LocationCityResource($locationCity);
    }
}
