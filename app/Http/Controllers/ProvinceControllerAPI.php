<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Http\Resources\ProvinceResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Http\Resources\Collections\ProvinceCollection;

class ProvinceControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\ProvinceCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Province::class);

        $province = Province::all();

        return new ProvinceCollection($province);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProvinceRequest  $request
     * @return \App\Http\Resources\ProvinceResource
     */
    public function store(ProvinceRequest $request)
    {    
          $validator = Validator::make($request->all(), Province::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
            
            $province= new Province;
            $province->user_id =$user_id;
            $province->country_id = $request->country_id;
            $province->province_name = $request->province_name;
            $province->province_name_ar = $request->province_name_ar;
            $province->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Province  $province
     * @return \App\Http\Resources\ProvinceResource
     */
    public function show($countryId)
    {
        //$this->authorize('view', $province);
        $provinces = Province::where('country_id',$countryId)->get();
        return new ProvinceResource($provinces);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProvinceRequest  $request
     * @param  \App\Province  $province
     * @return \App\Http\Resources\ProvinceResource
     */
    public function update(ProvinceRequest $request, Province $province)
    {
        $validator = Validator::make($request->all(), Province::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
            
            $province= Province::find($request->province_id);
            $province->user_id =$user_id;
            $province->country_id = $request->country_id;
            $province->province_name = $request->province_name;
            $province->province_name_ar = $request->province_name_ar;
            $province->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Province  $province
     * @return \App\Http\Resources\ProvinceResource
     */
    public function destroy(Province $province)
    {
        $this->authorize('delete', $province);

        $province->delete();

        return new ProvinceResource($province);

    }
}
