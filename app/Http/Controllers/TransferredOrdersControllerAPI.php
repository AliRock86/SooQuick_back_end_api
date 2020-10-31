<?php

namespace App\Http\Controllers;

use App\Models\TransferredOrders;
use App\Http\Resources\TransferredOrdersResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransferredOrdersRequest;
use App\Http\Resources\Collections\TransferredOrdersCollection;

class TransferredOrdersControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\TransferredOrdersCollection
     */
    public function index()
    {
        $this->authorize('viewAny', TransferredOrders::class);

        $transferredOrders = TransferredOrders::all();

        return new TransferredOrdersCollection($transferredOrders);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TransferredOrdersRequest  $request
     * @return \App\Http\Resources\TransferredOrdersResource
     */
    public function store(TransferredOrdersRequest $request)
    {
        $this->authorize('create', TransferredOrders::class);

        $transferredOrders = TransferredOrders::create($request->validated());

        return new TransferredOrdersResource($transferredOrders);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferredOrders  $transferredOrders
     * @return \App\Http\Resources\TransferredOrdersResource
     */
    public function show(TransferredOrders $transferredOrders)
    {
        $this->authorize('view', $transferredOrders);

        return new TransferredOrdersResource($transferredOrders);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TransferredOrdersRequest  $request
     * @param  \App\Models\TransferredOrders  $transferredOrders
     * @return \App\Http\Resources\TransferredOrdersResource
     */
    public function update(TransferredOrdersRequest $request, TransferredOrders $transferredOrders)
    {
        $this->authorize('update', $transferredOrders);

        $transferredOrders->update($request->validated());

        return new TransferredOrdersResource($transferredOrders);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferredOrders  $transferredOrders
     * @return \App\Http\Resources\TransferredOrdersResource
     */
    public function destroy(TransferredOrders $transferredOrders)
    {
        $this->authorize('delete', $transferredOrders);

        $transferredOrders->delete();

        return new TransferredOrdersResource($transferredOrders);

    }
}
