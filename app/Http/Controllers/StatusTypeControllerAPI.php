<?php

namespace App\Http\Controllers;

use App\Models\StatusType;
use App\Http\Resources\StatusTypeResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusTypeRequest;
use App\Http\Resources\Collections\StatusTypeCollection;

class StatusTypeControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\StatusTypeCollection
     */
    public function index()
    {
       // $this->authorize('viewAny', StatusType::class);

    $statusTypeType = StatusType::all();

        return new StatusTypeCollection($statusType);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusTypeRequest  $request
     * @return \App\Http\Resources\StatusTypeResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), StatusType::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
        
       $statusType= new StatusType;
       $statusType->user_id =$user_id;
       $statusType->status_type_name = $request->status_type_name;
       $statusType->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatusType$StatusTypeType
     * @return \App\Http\Resources\StatusTypeResource
     */
    public function show(StatusType$statusType)
    {
        $this->authorize('view',$statusType);

        return new StatusTypeResource($statusType);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusTypeRequest  $request
     * @param  \App\StatusType$StatusTypeType
     * @return \App\Http\Resources\StatusTypeResource
     */
    public function update(StatusTypeRequest $request, StatusType$statusType)
    {
        $this->authorize('update',$statusType);

    $statusTypeType->update($request->validated());

        return new StatusTypeResource($statusType);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatusType$StatusTypeType
     * @return \App\Http\Resources\StatusTypeResource
     */
    public function destroy(StatusType$statusType)
    {
        $this->authorize('delete',$statusType);

    $statusTypeType->delete();

        return new StatusTypeResource($statusType);

    }
}
