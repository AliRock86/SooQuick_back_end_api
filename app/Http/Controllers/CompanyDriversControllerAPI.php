<?php

namespace App\Http\Controllers;

use App\Models\CompanyDrivers;
use App\Http\Resources\CompanyDriversResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyDriversRequest;
use App\Http\Resources\Collections\CompanyDriversCollection;

class CompanyDriversControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\CompanyDriversCollection
     */
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $companyDrivers = CompanyDrivers::with(['driver','deliveryComp'])
        ->where('delivery_comp_id',$user->deliveryComp->id);

        return new CompanyDriversCollection($companyDrivers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyDriversRequest  $request
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), CompanyDrivers::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
                    
                $companyDrivers= new CompanyDrivers;
                $companyDrivers->addressable_id =$companyDriversable_id;
                $companyDrivers->addressable_type = $request->addressable_type;
                $companyDrivers->region_id = $request->region_id;
                $companyDrivers->long = $request->long;
                $companyDrivers->lat = $request->lat;
                $companyDrivers->lat = $request->lat;
                $companyDrivers->address_descraption = $request->address_descraption;
                $companyDrivers->save();

                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function show(CompanyDrivers $companyDrivers)
    {
        $this->authorize('view', $companyDrivers);

        return new CompanyDriversResource($companyDrivers);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyDriversRequest  $request
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function update(CompanyDriversRequest $request, CompanyDrivers $companyDrivers)
    {
        $this->authorize('update', $companyDrivers);

        $companyDrivers->update($request->validated());

        return new CompanyDriversResource($companyDrivers);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function destroy(CompanyDrivers $companyDrivers)
    {
        $this->authorize('delete', $companyDrivers);

        $companyDrivers->delete();

        return new CompanyDriversResource($companyDrivers);

    }
}
