<?php

namespace App\Http\Controllers;

use App\DeliveryPrice;
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
        $user = JWTAuth::parseToken()->authenticate();
        $deliveryPrice = new DeliveryCompany;
        $deliveryPrice->user_id = $user->id;
        $deliveryPrice->delivery_comp_barnd_name = $request->delivery_comp_barnd_name;
        $deliveryPrice->delivery_comp_email = ($request->delivery_comp_email) ? $request->delivery_comp_email : 'null';
        $deliveryPrice->delivery_comp_phone = $request->delivery_comp_phone;
        $deliveryPrice->delivery_comp_description =($request->delivery_comp_description) ? $request->delivery_comp_description : 'null';
        $deliveryPrice->status_id = 1;
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
        $this->authorize('update', $deliveryPrice);

        $deliveryPrice->update($request->validated());

        return new DeliveryPriceResource($deliveryPrice);

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
