<?php

namespace App\Http\Controllers;

use App\Model\Notification;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Notification::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
     
        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->notification_type_id = $request->notification_type_id;
        $notification->notification_title = $request->notification_title;
        $notification->notification_body = $request->notification_body;
        $notification->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

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
            $validator = Validator::make($request->all(), Notification::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
            $notification = Notification::find($request->notification_id);
            $notification->user_id = $user->id;
            $notification->notification_type_id = $request->notification_type_id;
            $notification->notification_title = $request->notification_title;
            $notification->notification_body = $request->notification_body;
            $notification->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);
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
