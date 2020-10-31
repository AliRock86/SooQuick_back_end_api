<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Http\Resources\PriceResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\PriceRequest;
use App\Http\Resources\Collections\PriceCollection;

class PriceControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\PriceCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Price::class);

        $price = Price::all();

        return new PriceCollection($price);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PriceRequest  $request
     * @return \App\Http\Resources\PriceResource
     */
    public function store(PriceRequest $request)
    {
        $this->authorize('create', Price::class);

        $price = Price::create($request->validated());

        return new PriceResource($price);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \App\Http\Resources\PriceResource
     */
    public function show(Price $price)
    {
        $this->authorize('view', $price);

        return new PriceResource($price);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PriceRequest  $request
     * @param  \App\Models\Price  $price
     * @return \App\Http\Resources\PriceResource
     */
    public function update(PriceRequest $request, Price $price)
    {
        $this->authorize('update', $price);

        $price->update($request->validated());

        return new PriceResource($price);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \App\Http\Resources\PriceResource
     */
    public function destroy(Price $price)
    {
        $this->authorize('delete', $price);

        $price->delete();

        return new PriceResource($price);

    }
}
