<?php

namespace App\Http\Controllers;

use App\DeliveryPrice;
use App\Http\Resources\DeliveryPriceResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryPriceRequest;
use App\Http\Resources\Collections\DeliveryPriceCollection;

class DeliveryPriceControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DeliveryPriceCollection
     */
    public function index()
    {
        $this->authorize('viewAny', DeliveryPrice::class);

        $deliveryPrice = DeliveryPrice::all();

        return new DeliveryPriceCollection($deliveryPrice);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryPriceRequest  $request
     * @return \App\Http\Resources\DeliveryPriceResource
     */
    public function store(DeliveryPriceRequest $request)
    {
        $this->authorize('create', DeliveryPrice::class);

        $deliveryPrice = DeliveryPrice::create($request->validated());

        return new DeliveryPriceResource($deliveryPrice);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return \App\Http\Resources\DeliveryPriceResource
     */
    public function show(DeliveryPrice $deliveryPrice)
    {
        $this->authorize('view', $deliveryPrice);

        return new DeliveryPriceResource($deliveryPrice);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryPriceRequest  $request
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return \App\Http\Resources\DeliveryPriceResource
     */
    public function update(DeliveryPriceRequest $request, DeliveryPrice $deliveryPrice)
    {
        $this->authorize('update', $deliveryPrice);

        $deliveryPrice->update($request->validated());

        return new DeliveryPriceResource($deliveryPrice);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return \App\Http\Resources\DeliveryPriceResource
     */
    public function destroy(DeliveryPrice $deliveryPrice)
    {
        $this->authorize('delete', $deliveryPrice);

        $deliveryPrice->delete();

        return new DeliveryPriceResource($deliveryPrice);

    }
}
