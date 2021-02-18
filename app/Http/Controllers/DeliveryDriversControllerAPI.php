<?php

namespace App\Http\Controllers;

use App\Model\DeliveryDrivers;
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
    public function store(Request $request)
    
        {
            $validator = Validator::make($request->all(), DeliveryDrivers::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
            
                
                    $deliveryDrivers = new DeliveryCompany;
                    $deliveryDrivers->driver_id = $driver_id;
                    $deliveryDrivers->order_id = $request->order_id;
                    $deliveryDrivers->status_id =$request->status_id;
                    $deliveryDrivers->save();
                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);
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
                $validator = Validator::make($request->all(), DeliveryDrivers::VALIDATION_RULE_STORE);
                if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
                $deliveryDrivers = DeliveryCompany::find($request->deliveryDrivers_id);
                $deliveryDrivers->driver_id = $driver_id;
                $deliveryDrivers->order_id = $request->order_id;
                $deliveryDrivers->status_id =$request->status_id;
                $deliveryDrivers->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);

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
    public function changeStatus($statusId, $userId)
    {
        $u = DeliveryDrivers::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }
}
