<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Resources\CountryResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\Collections\CountryCollection;

class CountryControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\CountryCollection
     */
    public function index()
    {
        //$this->authorize('viewAny', Country::class);

        $country = Country::all();

        return new CountryCollection($country);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CountryRequest  $request
     * @return \App\Http\Resources\CountryResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Country::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
                    
                $country= new CompanyDrivers;
                $country->addressable_id =$countryable_id;
                $country->addressable_type = $request->addressable_type;
                $country->region_id = $request->region_id;
                $country->long = $request->long;
                $country->lat = $request->lat;
                $country->lat = $request->lat;
                $country->address_descraption = $request->address_descraption;
                $country->save();

                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \App\Http\Resources\CountryResource
     */
    public function show(Country $country)
    {
        $this->authorize('view', $country);

        return new CountryResource($country);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CountryRequest  $request
     * @param  \App\Country  $country
     * @return \App\Http\Resources\CountryResource
     */
   
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), Country::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
                    
                $country= CompanyDrivers ::find($request->country_id);
                $country->addressable_id =$countryable_id;
                $country->addressable_type = $request->addressable_type;
                $country->region_id = $request->region_id;
                $country->long = $request->long;
                $country->lat = $request->lat;
                $country->lat = $request->lat;
                $country->address_descraption = $request->address_descraption;
                $country->save();

                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \App\Http\Resources\CountryResource
     */
    public function destroy(Country $country)
    {
        $this->authorize('delete', $country);

        $country->delete();

        return new CountryResource($country);

    }
}
