<?php

namespace App\Http\Controllers;

use App\Offer;
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
    public function store(OfferRequest $request)
    {
        $this->authorize('create', Offer::class);

        $offer = Offer::create($request->validated());

        return new OfferResource($offer);

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
        $this->authorize('update', $offer);

        $offer->update($request->validated());

        return new OfferResource($offer);

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
}
