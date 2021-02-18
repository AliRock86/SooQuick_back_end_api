<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Resources\RegionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Http\Resources\Collections\RegionCollection;

class RegionControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\RegionCollection
     */
    public function index()
    {
   
        $region = Region::all();

        return new RegionCollection($region);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RegionRequest  $request
     * @return \App\Http\Resources\RegionResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Region::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
        
            $region= new Region;
            $region->user_id =$user_id;
            $region->province_id = $request->province_id;
            $region->region_name = $request->region_name;
            $region->region_name_ar = $request->region_name_ar;
            $region->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \App\Http\Resources\RegionResource
     */
    public function show($regionId)
    {
       // $this->authorize('view', $region);
        $regions = Region::where('province_id',$regionId)->get();
        return new RegionResource($regions);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RegionRequest  $request
     * @param  \App\Region  $region
     * @return \App\Http\Resources\RegionResource
     */
    public function update(RegionRequest $request, Region $region)
    {
        $validator = Validator::make($request->all(), Region::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
        
            $region= Region::find($request->region_id);
            $region->user_id =$user_id;
            $region->province_id = $request->province_id;
            $region->region_name = $request->region_name;
            $region->region_name_ar = $request->region_name_ar;
            $region->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \App\Http\Resources\RegionResource
     */
    public function destroy(Region $region)
    {
        $this->authorize('delete', $region);

        $region->delete();

        return new RegionResource($region);

    }
}
