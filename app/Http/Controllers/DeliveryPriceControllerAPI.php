<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\DeliveryPrice;
use App\Http\Resources\DeliveryPriceResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryPriceRequest;
use App\Http\Resources\Collections\DeliveryPriceCollection;
use Validator;


class DeliveryPriceControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DeliveryPriceCollection
     */
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return new DeliveryPriceCollection($user->DeliveryCompany->DeliveryPrice);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryPriceRequest  $request
     * @return \App\Http\Resources\DeliveryPriceResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), DeliveryPrice::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }


        
        $user = JWTAuth::parseToken()->authenticate();
        $deliveryPrice = new DeliveryPrice;
        $deliveryPrice->delivery_comp_id  =$user->DeliveryCompany->id;
        $deliveryPrice->from_region_id  =$request->from_region_id;
        $deliveryPrice->to_region_id   = $request->to_region_id ;
        $deliveryPrice->delivery_price_value   = $request->delivery_price_value ;
        $deliveryPrice->delivery_price_weight_kilos   = $request->delivery_price_weight_kilos ;
        $deliveryPrice->delivery_prices_description  = $request->delivery_prices_description ;
        $deliveryPrice->save();


        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return \App\Http\Resources\DeliveryPriceResource
     */
    public function show($id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $deliveryPrice = DeliveryPrice::where('id','=',$id)->where('delivery_comp_id','=',$user->DeliveryCompany->id)->first();
        return new DeliveryPriceResource($deliveryPrice );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryPriceRequest  $request
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return \App\Http\Resources\DeliveryPriceResource
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), DeliveryPrice::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }



        $id=(int)$id;
        $user = JWTAuth::parseToken()->authenticate();
        $deliveryPrice = DeliveryPrice::where('id','=',$id)->where('delivery_comp_id','=',$user->DeliveryCompany->id)->first();
        $deliveryPrice->from_region_id  =$request->from_region_id;
        $deliveryPrice->to_region_id   = $request->to_region_id ;
        $deliveryPrice->delivery_price_value   = $request->delivery_price_value ;
        $deliveryPrice->delivery_price_weight_kilos   = $request->delivery_price_weight_kilos ;
        $deliveryPrice->delivery_prices_description  = $request->delivery_prices_description ;
        $deliveryPrice->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return \App\Http\Resources\DeliveryPriceResource
     */
    public function destroy(DeliveryPrice $deliveryPrice)
    {
        $this->authorize('delete', $deliveryPrice);

        $deliveryPrice->delete();

        return new DeliveryPriceResource($deliveryPrice);

    }
}
