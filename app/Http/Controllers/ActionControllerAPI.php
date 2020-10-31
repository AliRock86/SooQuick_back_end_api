<?php

namespace App\Http\Controllers;

use App\Action;
use App\Http\Resources\ActionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActionRequest;
use App\Http\Resources\Collections\ActionCollection;

class ActionControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\ActionCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Action::class);

        $action = Action::all();

        return new ActionCollection($action);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ActionRequest  $request
     * @return \App\Http\Resources\ActionResource
     */
    public function store(ActionRequest $request)
    {
        $this->authorize('create', Action::class);

        $action = Action::create($request->validated());

        return new ActionResource($action);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Action  $action
     * @return \App\Http\Resources\ActionResource
     */
    public function show(Action $action)
    {
        $this->authorize('view', $action);

        return new ActionResource($action);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ActionRequest  $request
     * @param  \App\Action  $action
     * @return \App\Http\Resources\ActionResource
     */
    public function update(ActionRequest $request, Action $action)
    {
        $this->authorize('update', $action);

        $action->update($request->validated());

        return new ActionResource($action);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Action  $action
     * @return \App\Http\Resources\ActionResource
     */
    public function destroy(Action $action)
    {
        $this->authorize('delete', $action);

        $action->delete();

        return new ActionResource($action);

    }
}
