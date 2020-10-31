<?php

namespace App\Http\Controllers;

use App\Permision;
use App\Http\Resources\PermisionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermisionRequest;
use App\Http\Resources\Collections\PermisionCollection;

class PermisionControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\PermisionCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Permision::class);

        $permision = Permision::all();

        return new PermisionCollection($permision);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PermisionRequest  $request
     * @return \App\Http\Resources\PermisionResource
     */
    public function store(PermisionRequest $request)
    {
        $this->authorize('create', Permision::class);

        $permision = Permision::create($request->validated());

        return new PermisionResource($permision);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permision  $permision
     * @return \App\Http\Resources\PermisionResource
     */
    public function show(Permision $permision)
    {
        $this->authorize('view', $permision);

        return new PermisionResource($permision);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PermisionRequest  $request
     * @param  \App\Permision  $permision
     * @return \App\Http\Resources\PermisionResource
     */
    public function update(PermisionRequest $request, Permision $permision)
    {
        $this->authorize('update', $permision);

        $permision->update($request->validated());

        return new PermisionResource($permision);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permision  $permision
     * @return \App\Http\Resources\PermisionResource
     */
    public function destroy(Permision $permision)
    {
        $this->authorize('delete', $permision);

        $permision->delete();

        return new PermisionResource($permision);

    }
}
