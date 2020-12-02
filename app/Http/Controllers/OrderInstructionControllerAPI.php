<?php

namespace App\Http\Controllers;

use App\Model\OrderInstruction;
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

       $orderInstructionInstruction = OrderInstruction::all();

        return new OrderInstructionCollection($orderInstruction);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderInstructionRequest  $request
     * @return \App\Http\Resources\OrderInstructionResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), OrderInstruction::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
     
     $orderInstruction = new OrderInstruction;
     $orderInstruction->order_id =$orderInstruction_id;
     $orderInstruction->instruction_id = $request->instruction_id;
     $orderInstruction->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderInstruction $orderInstructionInstruction
     * @return \App\Http\Resources\OrderInstructionResource
     */
    public function show(OrderInstruction$orderInstructionInstruction)
    {
        $this->authorize('view',$orderInstructionInstruction);

        return new OrderInstructionResource($orderInstruction);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderInstructionRequest  $request
     * @param  \App\OrderInstruction $orderInstructionInstruction
     * @return \App\Http\Resources\OrderInstructionResource
     */
    public function update(OrderInstructionRequest $request, OrderInstruction$orderInstructionInstruction)
    {
        $this->authorize('update',$orderInstructionInstruction);

       $orderInstructionInstruction->update($request->validated());

        return new OrderInstructionResource($orderInstruction);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderInstruction $orderInstructionInstruction
     * @return \App\Http\Resources\OrderInstructionResource
     */
    public function destroy(OrderInstruction$orderInstructionInstruction)
    {
        $this->authorize('delete',$orderInstructionInstruction);

       $orderInstructionInstruction->delete();

        return new OrderInstructionResource($orderInstruction);

    }
}
