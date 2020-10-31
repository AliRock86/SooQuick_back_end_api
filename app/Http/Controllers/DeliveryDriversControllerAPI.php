<?php

namespace App\Http\Controllers;

use App\DeliveryDrivers;
use App\Http\Resources\DeliveryDriversResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryDriversRequest;
use App\Http\Resources\Collections\DeliveryDriversCollection;

class DeliveryDriversControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DeliveryDriversCollection
     */
    public function index()
    {
        $this->authorize('viewAny', DeliveryDrivers::class);

        $deliveryDrivers = DeliveryDrivers::all();

        return new DeliveryDriversCollection($deliveryDrivers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryDriversRequest  $request
     * @return \App\Http\Resources\DeliveryDriversResource
     */
    public function store(DeliveryDriversRequest $request)
    {
        $this->authorize('create', DeliveryDrivers::class);

        $deliveryDrivers = DeliveryDrivers::create($request->validated());

        return new DeliveryDriversResource($deliveryDrivers);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return \App\Http\Resources\DeliveryDriversResource
     */
    public function show(DeliveryDrivers $deliveryDrivers)
    {
        $this->authorize('view', $deliveryDrivers);

        return new DeliveryDriversResource($deliveryDrivers);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryDriversRequest  $request
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return \App\Http\Resources\DeliveryDriversResource
     */
    public function update(DeliveryDriversRequest $request, DeliveryDrivers $deliveryDrivers)
    {
        $this->authorize('update', $deliveryDrivers);

        $deliveryDrivers->update($request->validated());

        return new DeliveryDriversResource($deliveryDrivers);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return \App\Http\Resources\DeliveryDriversResource
     */
    public function destroy(DeliveryDrivers $deliveryDrivers)
    {
        $this->authorize('delete', $deliveryDrivers);

        $deliveryDrivers->delete();

        return new DeliveryDriversResource($deliveryDrivers);

    }
}
