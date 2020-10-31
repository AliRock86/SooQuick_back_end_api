<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Resources\RegionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Http\Resources\Collections\RegionCollection;

class RegionControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\RegionCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Region::class);

        $region = Region::all();

        return new RegionCollection($region);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RegionRequest  $request
     * @return \App\Http\Resources\RegionResource
     */
    public function store(RegionRequest $request)
    {
        $this->authorize('create', Region::class);

        $region = Region::create($request->validated());

        return new RegionResource($region);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \App\Http\Resources\RegionResource
     */
    public function show($provinceId)
    {
       // $this->authorize('view', $region);
        $regions = Region::where('province_id',$provinceId)->get();
        return new RegionResource($regions);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RegionRequest  $request
     * @param  \App\Region  $region
     * @return \App\Http\Resources\RegionResource
     */
    public function update(RegionRequest $request, Region $region)
    {
        $this->authorize('update', $region);

        $region->update($request->validated());

        return new RegionResource($region);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \App\Http\Resources\RegionResource
     */
    public function destroy(Region $region)
    {
        $this->authorize('delete', $region);

        $region->delete();

        return new RegionResource($region);

    }
}
