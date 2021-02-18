<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Resources\StatusResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use App\Http\Resources\Collections\StatusCollection;

class StatusControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\StatusCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Status::class);

        $status = Status::all();

        return new StatusCollection($status);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusRequest  $request
     * @return \App\Http\Resources\StatusResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Status::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
            
            $status= new Status;
            $status->user_id =$user_id;
            $status->status_type_id = $request->status_type_id;
            $status->status_name = $request->status_name;
            $status->status_name_ar = $request->status_name_ar;
            $status->status_color = $request->status_color;
            $status->status_icon = $request->status_icon;
            $status->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \App\Http\Resources\StatusResource
     */
    public function show($statusTypeId)
    {
        //$this->authorize('view', $status);
        $status = Status::where('status_type_id',$statusTypeId)->get();
        return new StatusCollection($status);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusRequest  $request
     * @param  \App\Status  $status
     * @return \App\Http\Resources\StatusResource
     */
    public function update(StatusRequest $request, Status $status)
    {
      
        $validator = Validator::make($request->all(), Status::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
            
            $status= Status::find($request->status_id);
            $status->user_id =$user_id;
            $status->status_type_id = $request->status_type_id;
            $status->status_name = $request->status_name;
            $status->status_name_ar = $request->status_name_ar;
            $status->status_color = $request->status_color;
            $status->status_icon = $request->status_icon;
            $status->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \App\Http\Resources\StatusResource
     */
    public function destroy(Status $status)
    {
        $this->authorize('delete', $status);

        $status->delete();

        return new StatusResource($status);

    }
    public function changeStatus($statusId, $userId)
    {
        $u = Status::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }
}
