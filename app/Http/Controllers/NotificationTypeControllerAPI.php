<?php

namespace App\Http\Controllers;

use App\Model\NotificationType;
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

       $notificationTypeType = NotificationType::all();

        return new NotificationTypeCollection($notificationType);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NotificationTypeRequest  $request
     * @return \App\Http\Resources\NotificationTypeResource
     */
    public function store(Request $request)
    {
                $validator = Validator::make($request->all(), NotificationType::VALIDATION_RULE_STORE);
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'data' => $validator->messages(),
                    ], 400);
                }
                
                $notificationType = Notification::find($request->notificationType);
                $notificationType->notification_type_name = $request->notification_type_name;
                $notificationType->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);
    


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NotificationType $notificationTypeType
     * @return \App\Http\Resources\NotificationTypeResource
     */
    public function show(NotificationType$notificationTypeType)
    {
        $this->authorize('view',$notificationTypeType);

        return new NotificationTypeResource($notificationType);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\NotificationTypeRequest  $request
     * @param  \App\NotificationType $notificationTypeType
     * @return \App\Http\Resources\NotificationTypeResource
     */
    public function update(NotificationTypeRequest $request, NotificationType $notificationType)
        {
            $validator = Validator::make($request->all(), NotificationType::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
           $notificationType = Notification::find($request->notificationType);
           $notificationType->notification_type_name = $request->notification_type_name;
           $notificationType->save();
              return response()->json([
                'success' => true,
                'data' => 'done',
             ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificationType $notificationTypeType
     * @return \App\Http\Resources\NotificationTypeResource
     */
    public function destroy(NotificationType$notificationTypeType)
    {
        $this->authorize('delete',$notificationTypeType);

       $notificationTypeType->delete();

        return new NotificationTypeResource($notificationType);

    }
}
