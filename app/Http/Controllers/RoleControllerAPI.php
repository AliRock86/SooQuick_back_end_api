<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), Role::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
     
    $role= new Role;
    $role->user_id =$user_id;
    $role->role_name = $request->role_name;
    $role->save();
         return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

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
