<?php

namespace App\Http\Controllers;

use App\Model\OrderAction;
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
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), OrderAction::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
            $orderAction = new OrderAction;
            $orderAction->order_id = $order_id;
            $orderAction->action_id = $request->action_id;
            $orderAction->status_id = $request->status_id;
            $orderAction->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

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
            $validator = Validator::make($request->all(), OrderAction::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
            $orderAction = OrderAction::find($request->orderAction_id);
            $orderAction->order_id = $order_id;
            $orderAction->action_id = $request->action_id;
            $orderAction->status_id = $request->status_id;
            $orderAction->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

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
    public function changeStatus($statusId, $userId)
    {
        $u = OrderAction::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }
}
