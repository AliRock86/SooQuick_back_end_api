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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), TransferOrderByDrivers::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
            
        $transferOrderByDrivers= new TransferOrderByDrivers;
        $transferOrderByDrivers->order_id =$order_id;
        $transferOrderByDrivers->driver_id = $request->driver_id;
        $transferOrderByDrivers->still_has_it = $request->still_has_it;
        $transferOrderByDrivers->status_id = $request->status_id;
        $transferOrderByDrivers->save();

            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

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
        $validator = Validator::make($request->all(), TransferOrderByDrivers::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
            
            $transferOrderByDrivers= TransferOrderByDrivers::find($request->transferOrderByDrivers_id);
            $transferOrderByDrivers->order_id =$order_id;
            $transferOrderByDrivers->driver_id = $request->driver_id;
            $transferOrderByDrivers->still_has_it = $request->still_has_it;
            $transferOrderByDrivers->status_id = $request->status_id;
            $transferOrderByDrivers->save();

                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);

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
    public function changeStatus($statusId, $userId)
    {
        $u = TransferOrderByDrivers::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }
}
