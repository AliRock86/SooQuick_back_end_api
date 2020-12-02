<?php

namespace App\Http\Controllers;

use App\Driver;
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
        $validator = Validator::make($request->all(), User::VALIDATION_RULE_STORE);
        $validator1 = Validator::make($request->all(), Driver::VALIDATION_RULE_STORE);
        if ($validator->fails() && $validator1->messages()) {
            return response()->json([
                'success' => false,
                'data' => $validator1->messages() . $validator->messages(),
            ], 400);
        }
        $user = new User;
        $user->full_name = $request->full_name;
        $user->user_email = ($request->user_email) ? $request->user_email : 'null';
        $user->password = app('hash')->make($request->password);
        $user->user_phone = $request->user_phone;
        $user->role_id = 1;
        $user->status_id = 1;
        $user->mobile_token = md5(rand(1, 10) . microtime());
        $user->permision_id = 1;
        $user->save();
        $sms_content = mt_rand(19999, 999999);
        $driver->save();
        $driver = new Driver;
        $driver->user_id = $user->id;
        $driver->driver_description = ($request->driver_description) ? $request->driver_description : 'null';
        $driver->car_number = $request->car_number;
        $driver->driver_phone = $request->user_phone;
        $driver->car_owner_name = $request->car_owner_name;
        $driver->car_owner_type = $request->car_owner_type;
        $driver->status_id = 1;
        $driver->region_id = 1;

        try {
            DB::beginTransaction();
            $driver->save();
            $user->address()->create(
                [
                    'region_id' => $request->region_id,
                    'long' => $request->long,
                    'lat' => $request->lat,
                    'address_descraption' => (!$request->address_descraption) ? $request->address_descraption : 'aaa',
                ]);
            if (count($request->images) !== 0) {
                $upload = new UploadImageController;
                $path = $upload->uploadInner($request);
                $user->image()->create(
                    [
                        'image_url' => $path[0],
                    ]);
            }

           // Otp::create(['user_id' => $user->id, 'verify_number' => $sms_content]);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'data' => $e,
            ], 400);
        }
        DB::commit();
        $credentials = $request->only(['user_phone', 'password']);
        $token = JWTAuth::attempt($credentials);
        return response()->json([
            'success' => true,
            'token' => $token,
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
        $this->authorize('update', $driver);

        $driver->update($request->validated());

        return new DriverResource($driver);

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
}
