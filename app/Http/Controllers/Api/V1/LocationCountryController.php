<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\LocationCountryCollection;
use App\Http\Resources\Api\V1\LocationCountryResource;
use App\Models\LocationCountry;

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
        $locationCountries = $this->locationCountry->paginate($this->getApiPaginate());

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
        $locationCountry = $this->locationCountry->findOrFail($locationCountryId);

        return new LocationCountryResource($locationCountry);
    }
}
