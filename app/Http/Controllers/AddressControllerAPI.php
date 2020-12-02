<?php

namespace App\Http\Controllers;

use App\Model\Address;
use App\Http\Resources\AddressResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Resources\Collections\AddressCollection;

class AddressControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\AddressCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Address::class);

        $address = Address::all();

        return new AddressCollection($address);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AddressRequest  $request
     * @return \App\Http\Resources\AddressResource
     */
    public function store(Request $request)
    {

        
        $validator = Validator::make($request->all(), Address::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
                    
                $address= new Address;
                $address->addressable_id =$addressable_id;
                $address->addressable_type = $request->addressable_type;
                $address->region_id = $request->region_id;
                $address->long = $request->long;
                $address->lat = $request->lat;
                $address->lat = $request->lat;
                $address->address_descraption = $request->address_descraption;
                $address->save();

                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \App\Http\Resources\AddressResource
     */
    public function show(Address $address)
    {
        $this->authorize('view', $address);

        return new AddressResource($address);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AddressRequest  $request
     * @param  \App\Address  $address
     * @return \App\Http\Resources\AddressResource
     */
    public function update(AddressRequest $request, Address $address)
    {
        $validator = Validator::make($request->all(), Address::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
                    
                $address= Address::find($request->address_id);
                $address->addressable_id =$addressable_id;
                $address->addressable_type = $request->addressable_type;
                $address->region_id = $request->region_id;
                $address->long = $request->long;
                $address->lat = $request->lat;
                $address->lat = $request->lat;
                $address->address_descraption = $request->address_descraption;
                $address->save();

                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \App\Http\Resources\AddressResource
     */
    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);

        $address->delete();

        return new AddressResource($address);

    }
}
