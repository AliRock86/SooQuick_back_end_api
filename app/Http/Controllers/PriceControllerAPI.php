<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Http\Resources\PriceResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\PriceRequest;
use App\Http\Resources\Collections\PriceCollection;

class PriceControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\PriceCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Price::class);

        $price = Price::all();

        return new PriceCollection($price);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PriceRequest  $request
     * @return \App\Http\Resources\PriceResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Price::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
            
            
        $price= new Price;
        $price->user_id =$user_id;
        $price->permision_name = $request->permision_name;
        $price->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);

            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \App\Http\Resources\PriceResource
     */
    public function show(Price $price)
    {
        $this->authorize('view', $price);

        return new PriceResource($price);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PriceRequest  $request
     * @param  \App\Models\Price  $price
     * @return \App\Http\Resources\PriceResource
     */
    public function update(PriceRequest $request, Price $price)
    {
        $validator = Validator::make($request->all(), Price::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
            
            
            $price= Price::find($request->price_id);
            $price->user_id =$user_id;
            $price->permision_name = $request->permision_name;
            $price->save();
                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \App\Http\Resources\PriceResource
     */
    public function destroy(Price $price)
    {
        $this->authorize('delete', $price);

        $price->delete();

        return new PriceResource($price);

    }
}
