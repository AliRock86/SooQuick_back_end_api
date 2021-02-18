<?php

namespace App\Http\Controllers;

use App\Model\DeliveryPrice;
use App\Http\Resources\DeliveryPriceResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryPriceRequest;
use App\Http\Resources\Collections\DeliveryPriceCollection;

class DeliveryPriceControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DeliveryPriceCollection
     */
    public function index()
    {
        $this->authorize('viewAny', DeliveryPrice::class);

        $deliveryPrice = DeliveryPrice::all();

        return new DeliveryPriceCollection($deliveryPrice);

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
        
            
              $deliveryPrice = new DeliveryPrice;
              $deliveryPrice->delivery_comp_id = $delivery_comp_id;
              $deliveryPrice->from_region_id = $request->from_region_id;
              $deliveryPrice->to_region_id =$request->to_region_id;
              $deliveryPrice->delivery_price_value =$request->delivery_price_value;
              $deliveryPrice->delivery_price_weight_kilos =$request->delivery_price_weight_kilos;
              $deliveryPrice->delivery_prices_description =$request->delivery_prices_description;
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
    public function show(DeliveryPrice $deliveryPrice)
    {
        $this->authorize('view', $deliveryPrice);

        return new DeliveryPriceResource($deliveryPrice);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryPriceRequest  $request
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return \App\Http\Resources\DeliveryPriceResource
     */
    public function update(DeliveryPriceRequest $request, DeliveryPrice $deliveryPrice)
    {
        $validator = Validator::make($request->all(), DeliveryPrice::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
        
            
              $deliveryPrice = DeliveryPrice::find($request->deliveryPrice_id);
              $deliveryPrice->delivery_comp_id = $delivery_comp_id;
              $deliveryPrice->from_region_id = $request->from_region_id;
              $deliveryPrice->to_region_id =$request->to_region_id;
              $deliveryPrice->delivery_price_value =$request->delivery_price_value;
              $deliveryPrice->delivery_price_weight_kilos =$request->delivery_price_weight_kilos;
              $deliveryPrice->delivery_prices_description =$request->delivery_prices_description;
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
