<?php

namespace App\Http\Controllers;

use App\Model\Order;
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
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), Order::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
        $order = new Order;
        $order->order_id = $order_id;
        $order->action_id = $request->action_id;
        $order->status_id = $request->status_id;
        $order->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

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
            $validator = Validator::make($request->all(), Order::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
        $order = Order::find($request->order_id);
        $order->order_id = $order_id;
        $order->action_id = $request->action_id;
        $order->status_id = $request->status_id;
        $order->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);
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
    public function changeStatus($statusId, $userId)
    {
        $u = Order::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }
}
