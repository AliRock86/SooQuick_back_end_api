<?php

namespace App\Http\Controllers;

use App\OrderAction;
use App\Http\Resources\OrderActionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderActionRequest;
use App\Http\Resources\Collections\OrderActionCollection;

class OrderActionControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\OrderActionCollection
     */
    public function index()
    {
        $this->authorize('viewAny', OrderAction::class);

        $orderAction = OrderAction::all();

        return new OrderActionCollection($orderAction);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderActionRequest  $request
     * @return \App\Http\Resources\OrderActionResource
     */
    public function store(OrderActionRequest $request)
    {
        $this->authorize('create', OrderAction::class);

        $orderAction = OrderAction::create($request->validated());

        return new OrderActionResource($orderAction);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderAction  $orderAction
     * @return \App\Http\Resources\OrderActionResource
     */
    public function show(OrderAction $orderAction)
    {
        $this->authorize('view', $orderAction);

        return new OrderActionResource($orderAction);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderActionRequest  $request
     * @param  \App\OrderAction  $orderAction
     * @return \App\Http\Resources\OrderActionResource
     */
    public function update(OrderActionRequest $request, OrderAction $orderAction)
    {
        $this->authorize('update', $orderAction);

        $orderAction->update($request->validated());

        return new OrderActionResource($orderAction);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderAction  $orderAction
     * @return \App\Http\Resources\OrderActionResource
     */
    public function destroy(OrderAction $orderAction)
    {
        $this->authorize('delete', $orderAction);

        $orderAction->delete();

        return new OrderActionResource($orderAction);

    }
}
