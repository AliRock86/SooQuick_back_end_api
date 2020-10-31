<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Resources\CountryResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\Collections\CountryCollection;

class CountryControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\CountryCollection
     */
    public function index()
    {
        //$this->authorize('viewAny', Country::class);

        $country = Country::all();

        return new CountryCollection($country);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CountryRequest  $request
     * @return \App\Http\Resources\CountryResource
     */
    public function store(CountryRequest $request)
    {
        $this->authorize('create', Country::class);

        $country = Country::create($request->validated());

        return new CountryResource($country);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \App\Http\Resources\CountryResource
     */
    public function show(Country $country)
    {
        $this->authorize('view', $country);

        return new CountryResource($country);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CountryRequest  $request
     * @param  \App\Country  $country
     * @return \App\Http\Resources\CountryResource
     */
    public function update(CountryRequest $request, Country $country)
    {
        $this->authorize('update', $country);

        $country->update($request->validated());

        return new CountryResource($country);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \App\Http\Resources\CountryResource
     */
    public function destroy(Country $country)
    {
        $this->authorize('delete', $country);

        $country->delete();

        return new CountryResource($country);

    }
}
