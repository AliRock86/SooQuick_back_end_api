<?php

namespace App\Http\Controllers;

use App\Role;
use App\Http\Resources\RoleResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\Collections\RoleCollection;

class RoleControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\RoleCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Role::class);

        $role = Role::all();

        return new RoleCollection($role);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \App\Http\Resources\RoleResource
     */
    public function store(RoleRequest $request)
    {
        $this->authorize('create', Role::class);

        $role = Role::create($request->validated());

        return new RoleResource($role);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \App\Http\Resources\RoleResource
     */
    public function show(Role $role)
    {
        $this->authorize('view', $role);

        return new RoleResource($role);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Role  $role
     * @return \App\Http\Resources\RoleResource
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $role->update($request->validated());

        return new RoleResource($role);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \App\Http\Resources\RoleResource
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return new RoleResource($role);

    }
}
