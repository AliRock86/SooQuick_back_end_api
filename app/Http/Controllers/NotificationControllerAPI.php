<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Http\Resources\NotificationResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\Collections\NotificationCollection;

class NotificationControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\NotificationCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Notification::class);

        $notification = Notification::all();

        return new NotificationCollection($notification);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NotificationRequest  $request
     * @return \App\Http\Resources\NotificationResource
     */
    public function store(NotificationRequest $request)
    {
        $this->authorize('create', Notification::class);

        $notification = Notification::create($request->validated());

        return new NotificationResource($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \App\Http\Resources\NotificationResource
     */
    public function show(Notification $notification)
    {
        $this->authorize('view', $notification);

        return new NotificationResource($notification);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\NotificationRequest  $request
     * @param  \App\Notification  $notification
     * @return \App\Http\Resources\NotificationResource
     */
    public function update(NotificationRequest $request, Notification $notification)
    {
        $this->authorize('update', $notification);

        $notification->update($request->validated());

        return new NotificationResource($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \App\Http\Resources\NotificationResource
     */
    public function destroy(Notification $notification)
    {
        $this->authorize('delete', $notification);

        $notification->delete();

        return new NotificationResource($notification);

    }
}
