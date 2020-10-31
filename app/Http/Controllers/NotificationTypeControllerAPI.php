<?php

namespace App\Http\Controllers;

use App\NotificationType;
use App\Http\Resources\NotificationTypeResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationTypeRequest;
use App\Http\Resources\Collections\NotificationTypeCollection;

class NotificationTypeControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\NotificationTypeCollection
     */
    public function index()
    {
        $this->authorize('viewAny', NotificationType::class);

        $notificationType = NotificationType::all();

        return new NotificationTypeCollection($notificationType);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NotificationTypeRequest  $request
     * @return \App\Http\Resources\NotificationTypeResource
     */
    public function store(NotificationTypeRequest $request)
    {
        $this->authorize('create', NotificationType::class);

        $notificationType = NotificationType::create($request->validated());

        return new NotificationTypeResource($notificationType);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NotificationType  $notificationType
     * @return \App\Http\Resources\NotificationTypeResource
     */
    public function show(NotificationType $notificationType)
    {
        $this->authorize('view', $notificationType);

        return new NotificationTypeResource($notificationType);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\NotificationTypeRequest  $request
     * @param  \App\NotificationType  $notificationType
     * @return \App\Http\Resources\NotificationTypeResource
     */
    public function update(NotificationTypeRequest $request, NotificationType $notificationType)
    {
        $this->authorize('update', $notificationType);

        $notificationType->update($request->validated());

        return new NotificationTypeResource($notificationType);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificationType  $notificationType
     * @return \App\Http\Resources\NotificationTypeResource
     */
    public function destroy(NotificationType $notificationType)
    {
        $this->authorize('delete', $notificationType);

        $notificationType->delete();

        return new NotificationTypeResource($notificationType);

    }
}
