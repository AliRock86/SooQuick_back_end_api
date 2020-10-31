<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Http\Resources\ProvinceResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Http\Resources\Collections\ProvinceCollection;

class ProvinceControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\ProvinceCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Province::class);

        $province = Province::all();

        return new ProvinceCollection($province);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProvinceRequest  $request
     * @return \App\Http\Resources\ProvinceResource
     */
    public function store(ProvinceRequest $request)
    {
        $this->authorize('create', Province::class);

        $province = Province::create($request->validated());

        return new ProvinceResource($province);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Province  $province
     * @return \App\Http\Resources\ProvinceResource
     */
    public function show($countryId)
    {
        //$this->authorize('view', $province);
        $provinces = Province::where('country_id',$countryId)->get();
        return new ProvinceResource($provinces);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProvinceRequest  $request
     * @param  \App\Province  $province
     * @return \App\Http\Resources\ProvinceResource
     */
    public function update(ProvinceRequest $request, Province $province)
    {
        $this->authorize('update', $province);

        $province->update($request->validated());

        return new ProvinceResource($province);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Province  $province
     * @return \App\Http\Resources\ProvinceResource
     */
    public function destroy(Province $province)
    {
        $this->authorize('delete', $province);

        $province->delete();

        return new ProvinceResource($province);

    }
}
