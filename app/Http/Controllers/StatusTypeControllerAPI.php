<?php

namespace App\Http\Controllers;

use App\Models\StatusType;
use App\Http\Resources\StatusTypeResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusTypeRequest;
use App\Http\Resources\Collections\StatusTypeCollection;

class StatusTypeControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\StatusTypeCollection
     */
    public function index()
    {
       // $this->authorize('viewAny', StatusType::class);

        $statusType = StatusType::all();

        return new StatusTypeCollection($statusType);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusTypeRequest  $request
     * @return \App\Http\Resources\StatusTypeResource
     */
    public function store(StatusTypeRequest $request)
    {
        $this->authorize('create', StatusType::class);

        $statusType = StatusType::create($request->validated());

        return new StatusTypeResource($statusType);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatusType  $statusType
     * @return \App\Http\Resources\StatusTypeResource
     */
    public function show(StatusType $statusType)
    {
        $this->authorize('view', $statusType);

        return new StatusTypeResource($statusType);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusTypeRequest  $request
     * @param  \App\StatusType  $statusType
     * @return \App\Http\Resources\StatusTypeResource
     */
    public function update(StatusTypeRequest $request, StatusType $statusType)
    {
        $this->authorize('update', $statusType);

        $statusType->update($request->validated());

        return new StatusTypeResource($statusType);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatusType  $statusType
     * @return \App\Http\Resources\StatusTypeResource
     */
    public function destroy(StatusType $statusType)
    {
        $this->authorize('delete', $statusType);

        $statusType->delete();

        return new StatusTypeResource($statusType);

    }
}
