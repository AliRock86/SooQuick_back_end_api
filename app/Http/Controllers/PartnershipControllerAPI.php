<?php

namespace App\Http\Controllers;

use App\Partnership;
use App\Http\Resources\PartnershipResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnershipRequest;
use App\Http\Resources\Collections\PartnershipCollection;

class PartnershipControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\PartnershipCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Partnership::class);

        $partnership = Partnership::all();

        return new PartnershipCollection($partnership);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PartnershipRequest  $request
     * @return \App\Http\Resources\PartnershipResource
     */
    public function store(PartnershipRequest $request)
    {
        $this->authorize('create', Partnership::class);

        $partnership = Partnership::create($request->validated());

        return new PartnershipResource($partnership);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partnership  $partnership
     * @return \App\Http\Resources\PartnershipResource
     */
    public function show(Partnership $partnership)
    {
        $this->authorize('view', $partnership);

        return new PartnershipResource($partnership);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PartnershipRequest  $request
     * @param  \App\Partnership  $partnership
     * @return \App\Http\Resources\PartnershipResource
     */
    public function update(PartnershipRequest $request, Partnership $partnership)
    {
        $this->authorize('update', $partnership);

        $partnership->update($request->validated());

        return new PartnershipResource($partnership);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partnership  $partnership
     * @return \App\Http\Resources\PartnershipResource
     */
    public function destroy(Partnership $partnership)
    {
        $this->authorize('delete', $partnership);

        $partnership->delete();

        return new PartnershipResource($partnership);

    }
}
