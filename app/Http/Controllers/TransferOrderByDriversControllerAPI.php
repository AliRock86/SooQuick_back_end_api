<?php

namespace App\Http\Controllers;

use App\Models\TransferOrderByDrivers;
use App\Http\Resources\TransferOrderByDriversResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransferOrderByDriversRequest;
use App\Http\Resources\Collections\TransferOrderByDriversCollection;

class TransferOrderByDriversControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\TransferOrderByDriversCollection
     */
    public function index()
    {
        $this->authorize('viewAny', TransferOrderByDrivers::class);

        $transferOrderByDrivers = TransferOrderByDrivers::all();

        return new TransferOrderByDriversCollection($transferOrderByDrivers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TransferOrderByDriversRequest  $request
     * @return \App\Http\Resources\TransferOrderByDriversResource
     */
    public function store(TransferOrderByDriversRequest $request)
    {
        $this->authorize('create', TransferOrderByDrivers::class);

        $transferOrderByDrivers = TransferOrderByDrivers::create($request->validated());

        return new TransferOrderByDriversResource($transferOrderByDrivers);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferOrderByDrivers  $transferOrderByDrivers
     * @return \App\Http\Resources\TransferOrderByDriversResource
     */
    public function show(TransferOrderByDrivers $transferOrderByDrivers)
    {
        $this->authorize('view', $transferOrderByDrivers);

        return new TransferOrderByDriversResource($transferOrderByDrivers);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TransferOrderByDriversRequest  $request
     * @param  \App\Models\TransferOrderByDrivers  $transferOrderByDrivers
     * @return \App\Http\Resources\TransferOrderByDriversResource
     */
    public function update(TransferOrderByDriversRequest $request, TransferOrderByDrivers $transferOrderByDrivers)
    {
        $this->authorize('update', $transferOrderByDrivers);

        $transferOrderByDrivers->update($request->validated());

        return new TransferOrderByDriversResource($transferOrderByDrivers);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferOrderByDrivers  $transferOrderByDrivers
     * @return \App\Http\Resources\TransferOrderByDriversResource
     */
    public function destroy(TransferOrderByDrivers $transferOrderByDrivers)
    {
        $this->authorize('delete', $transferOrderByDrivers);

        $transferOrderByDrivers->delete();

        return new TransferOrderByDriversResource($transferOrderByDrivers);

    }
}
