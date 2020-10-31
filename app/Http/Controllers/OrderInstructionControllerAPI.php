<?php

namespace App\Http\Controllers;

use App\OrderInstruction;
use App\Http\Resources\OrderInstructionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderInstructionRequest;
use App\Http\Resources\Collections\OrderInstructionCollection;

class OrderInstructionControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\OrderInstructionCollection
     */
    public function index()
    {
        $this->authorize('viewAny', OrderInstruction::class);

        $orderInstruction = OrderInstruction::all();

        return new OrderInstructionCollection($orderInstruction);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderInstructionRequest  $request
     * @return \App\Http\Resources\OrderInstructionResource
     */
    public function store(OrderInstructionRequest $request)
    {
        $this->authorize('create', OrderInstruction::class);

        $orderInstruction = OrderInstruction::create($request->validated());

        return new OrderInstructionResource($orderInstruction);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderInstruction  $orderInstruction
     * @return \App\Http\Resources\OrderInstructionResource
     */
    public function show(OrderInstruction $orderInstruction)
    {
        $this->authorize('view', $orderInstruction);

        return new OrderInstructionResource($orderInstruction);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderInstructionRequest  $request
     * @param  \App\OrderInstruction  $orderInstruction
     * @return \App\Http\Resources\OrderInstructionResource
     */
    public function update(OrderInstructionRequest $request, OrderInstruction $orderInstruction)
    {
        $this->authorize('update', $orderInstruction);

        $orderInstruction->update($request->validated());

        return new OrderInstructionResource($orderInstruction);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderInstruction  $orderInstruction
     * @return \App\Http\Resources\OrderInstructionResource
     */
    public function destroy(OrderInstruction $orderInstruction)
    {
        $this->authorize('delete', $orderInstruction);

        $orderInstruction->delete();

        return new OrderInstructionResource($orderInstruction);

    }
}
