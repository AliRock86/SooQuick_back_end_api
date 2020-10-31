<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Resources\StatusResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use App\Http\Resources\Collections\StatusCollection;

class StatusControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\StatusCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Status::class);

        $status = Status::all();

        return new StatusCollection($status);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusRequest  $request
     * @return \App\Http\Resources\StatusResource
     */
    public function store(StatusRequest $request)
    {
        $this->authorize('create', Status::class);

        $status = Status::create($request->validated());

        return new StatusResource($status);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \App\Http\Resources\StatusResource
     */
    public function show($statusTypeId)
    {
        //$this->authorize('view', $status);
        $status = Status::where('status_type_id',$statusTypeId)->get();
        return new StatusCollection($status);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusRequest  $request
     * @param  \App\Status  $status
     * @return \App\Http\Resources\StatusResource
     */
    public function update(StatusRequest $request, Status $status)
    {
        $this->authorize('update', $status);

        $status->update($request->validated());

        return new StatusResource($status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \App\Http\Resources\StatusResource
     */
    public function destroy(Status $status)
    {
        $this->authorize('delete', $status);

        $status->delete();

        return new StatusResource($status);

    }
}
