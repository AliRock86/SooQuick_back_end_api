<?php

namespace App\Http\Controllers;

use App\Model\Partnership;
use App\Http\Resources\PartnershipResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnershipRequest;
use App\Http\Resources\Collections\PartnershipCollection;

class PartnershipControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\PartnershipCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Partnership::class);

        $partnership = Partnership::all();

        return new PartnershipCollection($partnership);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PartnershipRequest  $request
     * @return \App\Http\Resources\PartnershipResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Partnership::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
     
        $partnership= new Partnership;
        $partnership->user_id =$user_id;
        $partnership->delivery_comp_id = $request->delivery_comp_id;
        $partnership->merchant_id = $request->merchant_id;
        $partnership->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partnership  $partnership
     * @return \App\Http\Resources\PartnershipResource
     */
    public function show(Partnership $partnership)
    {
        $this->authorize('view', $partnership);

        return new PartnershipResource($partnership);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PartnershipRequest  $request
     * @param  \App\Partnership  $partnership
     * @return \App\Http\Resources\PartnershipResource
     */
    public function update(PartnershipRequest $request, Partnership $partnership)
    {
        $validator = Validator::make($request->all(), Partnership::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
        
        
        $partnership= Partnership::find($request->partnership_id);
        $partnership->user_id =$user_id;
        $partnership->delivery_comp_id = $request->delivery_comp_id;
        $partnership->merchant_id = $request->merchant_id;
        $partnership->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partnership  $partnership
     * @return \App\Http\Resources\PartnershipResource
     */
    public function destroy(Partnership $partnership)
    {
        $this->authorize('delete', $partnership);

        $partnership->delete();

        return new PartnershipResource($partnership);

    }
}
