<?php

namespace App\Http\Controllers;

use App\Model\Offer;
use App\Http\Resources\OfferResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Http\Resources\Collections\OfferCollection;

class OfferControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\OfferCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Offer::class);

        $offer = Offer::all();

        return new OfferCollection($offer);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OfferRequest  $request
     * @return \App\Http\Resources\OfferResource
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), Offer::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
            $offer = new Offer;
            $offer->merchant_id = $merchant_id;
            $offer->region_id = $request->region_id;
            $offer->status_id = $request->status_id;
            $offer->notification_body = $request->notification_body;
            $offer->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \App\Http\Resources\OfferResource
     */
    public function show(Offer $offer)
    {
        $this->authorize('view', $offer);

        return new OfferResource($offer);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OfferRequest  $request
     * @param  \App\Offer  $offer
     * @return \App\Http\Resources\OfferResource
     */
    public function update(OfferRequest $request, Offer $offer)
        {
            $validator = Validator::make($request->all(), Offer::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
            $offer = Offer::find($request->offer_id);
            $offer->merchant_id = $merchant_id;
            $offer->region_id = $request->region_id;
            $offer->status_id = $request->status_id;
            $offer->notification_body = $request->notification_body;
            $offer->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \App\Http\Resources\OfferResource
     */
    public function destroy(Offer $offer)
    {
        $this->authorize('delete', $offer);

        $offer->delete();

        return new OfferResource($offer);

    }
    
    public function changeStatus($statusId, $userId)
    {
        $u = Offer::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }

}
