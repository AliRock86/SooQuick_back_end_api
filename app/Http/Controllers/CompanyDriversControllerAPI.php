<?php

namespace App\Http\Controllers;

use App\Models\CompanyDrivers;
use App\Http\Resources\CompanyDriversResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyDriversRequest;
use App\Http\Resources\Collections\CompanyDriversCollection;

class CompanyDriversControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\CompanyDriversCollection
     */
    public function index()
    {
        $this->authorize('viewAny', CompanyDrivers::class);

        $companyDrivers = CompanyDrivers::all();

        return new CompanyDriversCollection($companyDrivers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyDriversRequest  $request
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function store(CompanyDriversRequest $request)
    {
        $this->authorize('create', CompanyDrivers::class);

        $companyDrivers = CompanyDrivers::create($request->validated());

        return new CompanyDriversResource($companyDrivers);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function show(CompanyDrivers $companyDrivers)
    {
        $this->authorize('view', $companyDrivers);

        return new CompanyDriversResource($companyDrivers);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyDriversRequest  $request
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function update(CompanyDriversRequest $request, CompanyDrivers $companyDrivers)
    {
        $this->authorize('update', $companyDrivers);

        $companyDrivers->update($request->validated());

        return new CompanyDriversResource($companyDrivers);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function destroy(CompanyDrivers $companyDrivers)
    {
        $this->authorize('delete', $companyDrivers);

        $companyDrivers->delete();

        return new CompanyDriversResource($companyDrivers);

    }
}
