<?php

namespace App\Http\Controllers;
use App\Models\DeliveryDrivers;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\Collections\OrderCollection;
use App\Http\Resources\DeliveryDriversResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryDriversRequest;
use App\Http\Resources\Collections\DeliveryDriversCollection;
use Validator;
use Illuminate\Http\Request;
use JWTAuth;
class DeliveryDriversControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DeliveryDriversCollection
     */
    public function index()
    {
        $this->authorize('viewAny', DeliveryDrivers::class);

        $deliveryDrivers = DeliveryDrivers::all();

        return new DeliveryDriversCollection($deliveryDrivers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryDriversRequest  $request
     * @return \App\Http\Resources\DeliveryDriversResource
     */

     public function GetByDriverId(Request $request)
     {
        
        $user = JWTAuth::parseToken()->authenticate();
       $DeliveryDrivers=DeliveryDrivers::where('driver_id','=',$user->driver->id)->with('order')->get()->pluck('order');
        return new OrderCollection($DeliveryDrivers);


     }
    public function store(Request $request)
    {

       
        $validator = Validator::make($request->all(), DeliveryDrivers::VALIDATION_RULE_STORE);
        
       

         if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);

        }
        $user = JWTAuth::parseToken()->authenticate();
        $Order= Order::whereIn('id',$request->order_id)->where('delivery_comp_id','=',$user->DeliveryCompany->id)->get();
            if(count($Order)>0)
            {
            for($i=0;$i<=count($request->order_id);$i++)
            {
              
                $DeliveryDrivers =new DeliveryDrivers();
                $DeliveryDrivers->driver_id=$request->driver_id;
                $DeliveryDrivers->order_id=$request->order_id[$i];
                $DeliveryDrivers->status_id=2;
                $DeliveryDrivers->save();
              
            }

            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

            }
            else
            {
                return response()->json([
                    'success' => false,
                    'data' =>null,
                ], 400);


            }
      
}

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return \App\Http\Resources\DeliveryDriversResource
     */
    public function show(DeliveryDrivers $deliveryDrivers)
    {
        $this->authorize('view', $deliveryDrivers);

        return new DeliveryDriversResource($deliveryDrivers);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryDriversRequest  $request
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return \App\Http\Resources\DeliveryDriversResource
     */
    public function update(DeliveryDriversRequest $request, DeliveryDrivers $deliveryDrivers)

        { 
                $validator = Validator::make($request->all(), DeliveryDrivers::VALIDATION_RULE_STORE);
                if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
                $deliveryDrivers = DeliveryCompany::find($request->deliveryDrivers_id);
                $deliveryDrivers->driver_id = $driver_id;
                $deliveryDrivers->order_id = $request->order_id;
                $deliveryDrivers->status_id =$request->status_id;
                $deliveryDrivers->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return \App\Http\Resources\DeliveryDriversResource
     */
    public function destroy(DeliveryDrivers $deliveryDrivers)
    {
        $this->authorize('delete', $deliveryDrivers);

        $deliveryDrivers->delete();

        return new DeliveryDriversResource($deliveryDrivers);

    }
    public function changeStatus($statusId, $userId)
    {
        $u = DeliveryDrivers::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }
}
