<?php

namespace App\Http\Controllers;

use App\Model\Driver;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Http\Resources\DriverResource;
use App\Http\Resources\Collections\DriverCollection;

class DriverControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DriverCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Driver::class);

        $driver = Driver::all();

        return new DriverCollection($driver);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DriverRequest  $request
     * @return \App\Http\Resources\DriverResource
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), Driver::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
            
                
                $driver = new Driver;
                $driver->user_id = $user_id;
                $driver->driver_phone = $request->driver_phone;
                $driver->car_number =$request->car_number;
                $driver->car_owner_name =$request->car_owner_name;
                $driver->car_owner_type =$request->car_owner_type;
                $driver->region_id =$request->region_id;
                $driver->status_id =$request->status_id;
                $driver->save();
                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \App\Http\Resources\DriverResource
     */
    public function show(Driver $driver)
    {
        $this->authorize('view', $driver);

        return new DriverResource($driver);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DriverRequest  $request
     * @param  \App\Driver  $driver
     * @return \App\Http\Resources\DriverResource
     */
    public function update(DriverRequest $request, Driver $driver)
    {
        $validator = Validator::make($request->all(), Driver::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
            
                
                $driver = Driver::find($request->driver_id);
                $driver->user_id = $user_id;
                $driver->driver_phone = $request->driver_phone;
                $driver->car_number =$request->car_number;
                $driver->car_owner_name =$request->car_owner_name;
                $driver->car_owner_type =$request->car_owner_type;
                $driver->region_id =$request->region_id;
                $driver->status_id =$request->status_id;
                $driver->save();
                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \App\Http\Resources\DriverResource
     */
    public function destroy(Driver $driver)
    {
        $this->authorize('delete', $driver);

        $driver->delete();

        return new DriverResource($driver);

    }
    public function changeStatus($statusId, $userId)
    {
        $u = Driver::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }
}
