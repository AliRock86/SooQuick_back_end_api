<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Http\Resources\DriverResource;
use App\Http\Resources\Collections\DriverCollection;
use Validator;
class DriverControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DriverCollection
     */
    public function index(Driver $driver)
    {
       // $this->authorize('viewAny', Driver::class);

      //  $driver = Driver::all();

      return new DriverResource($driver);

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
        $request->request->add([ 'role_id' =>3]);
           
       

         if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);

        }
    
       
        $user  = app(UserControllerAPI::class)->store($request);


            if(!$user)
        {
            
            return response()->json([
                'success' => false,
                'data' => null,
            ], 400);


            
        }

       
        $driver = new Driver;
        $driver->user_id =  $user['data']->id;
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

    // public function show(Driver $driver)
    // {
    public function show(Driver $driver)
    {

        if($driver)
        {
            return response()->json([
                'success' => true,
                'data' =>new DriverResource($driver),
            ], 200);
           

        }

        else
        {
            return response()->json([
                'success' => false,
                'data' =>'Not_Found',
            ], 200);
        }
   
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DriverRequest  $request
     * @param  \App\Driver  $driver
     * @return \App\Http\Resources\DriverResource
     */
    public function update(Request $request)
    {
    
        $validator = Validator::make($request->all(), Driver::VALIDATION_RULE_UPDATE);
        
       

         if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);

        }
    
       
        $user  = app(UserControllerAPI::class)->update($request);


            if(!$user)
        {
            
            return response()->json([
                'success' => false,
                'data' => null,
            ], 400);


            
        }

     
        $driver =Driver::where('user_id','=',$user['data']->id)->first();
       
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
          

           // Otp::create(['user_id' => $user->id, 'verify_number' => $sms_content]);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'data' => $e,
            ], 400);
        }
        DB::commit();
      
        return response()->json([
            'success' => true,
            'data'=>null
           
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
