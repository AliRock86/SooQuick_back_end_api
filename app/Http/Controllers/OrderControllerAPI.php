<?php

namespace App\Http\Controllers;

use App\Order;
use App\Http\Resources\OrderResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\Collections\OrderCollection;

class OrderControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\OrderCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Order::class);

        $order = Order::all();

        return new OrderCollection($order);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @return \App\Http\Resources\OrderResource
     */
    public function store(OrderRequest $request)
    {
        $this->authorize('create', Order::class);

        $order = Order::create($request->validated());

        return new OrderResource($order);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderResource
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order);

        return new OrderResource($order);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderResource
     */
    public function update(OrderRequest $request, Order $order)
    {
        $this->authorize('update', $order);

        $order->update($request->validated());

        return new OrderResource($order);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderResource
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);

        $order->delete();

        return new OrderResource($order);

    }
}
