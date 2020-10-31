<?php

namespace App\Http\Controllers;

use App\DeliveryCompany;
use App\Http\Resources\DeliveryCompanyResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryCompanyRequest;
use App\Http\Resources\Collections\DeliveryCompanyCollection;

class DeliveryCompanyControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DeliveryCompanyCollection
     */
    public function index()
    {
        $this->authorize('viewAny', DeliveryCompany::class);

        $deliveryCompany = DeliveryCompany::all();

        return new DeliveryCompanyCollection($deliveryCompany);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryCompanyRequest  $request
     * @return \App\Http\Resources\DeliveryCompanyResource
     */
    public function store(DeliveryCompanyRequest $request)
    {
        $this->authorize('create', DeliveryCompany::class);

        $deliveryCompany = DeliveryCompany::create($request->validated());

        return new DeliveryCompanyResource($deliveryCompany);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryCompany  $deliveryCompany
     * @return \App\Http\Resources\DeliveryCompanyResource
     */
    public function show(DeliveryCompany $deliveryCompany)
    {
        $this->authorize('view', $deliveryCompany);

        return new DeliveryCompanyResource($deliveryCompany);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryCompanyRequest  $request
     * @param  \App\DeliveryCompany  $deliveryCompany
     * @return \App\Http\Resources\DeliveryCompanyResource
     */
    public function update(DeliveryCompanyRequest $request, DeliveryCompany $deliveryCompany)
    {
        $this->authorize('update', $deliveryCompany);

        $deliveryCompany->update($request->validated());

        return new DeliveryCompanyResource($deliveryCompany);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryCompany  $deliveryCompany
     * @return \App\Http\Resources\DeliveryCompanyResource
     */
    public function destroy(DeliveryCompany $deliveryCompany)
    {
        $this->authorize('delete', $deliveryCompany);

        $deliveryCompany->delete();

        return new DeliveryCompanyResource($deliveryCompany);

    }
}
