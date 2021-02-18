<?php

namespace App\Http\Controllers;
use JWTAuth;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Resources\Collections\OrderCollection;
use Validator;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Partnership;

class OrderControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\OrderCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Order::class);

        $order = Order::all();

        return new OrderCollection($order);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @return \App\Http\Resources\OrderResource
     */

    public function SearchByDeliveryCom(Request $request)
    {

        $user = JWTAuth::parseToken()->authenticate();

        $items = QueryBuilder::for(Order::class)
        ->where('delivery_comp_id','=',$user->DeliveryCompany->id)
        ->allowedFilters(['id','status_id','customer.customer_phone_1','customer.region_id',AllowedFilter::scope('BetweenDate')])
        ->paginate(15);
       return new  OrderCollection($items);
       

    }


    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), Order::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
        $order = new Order;
        $order->order_id = $order_id;
        $order->action_id = $request->action_id;
        $order->status_id = $request->status_id;
        $order->save();
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
      
        $user = JWTAuth::parseToken()->authenticate();
        $Partnership=Partnership::where('delivery_comp_id','=',$request->delivery_comp_id)->where('merchant_id','=',$user->merchant->id)->first();
        if($Partnership)
        {
        if($Partnership->status_id==21)
        {
            return response()->json([
                'success' => false,
                'data' =>'PartnershipIsBinding',
            ], 400);
        }
        else if($Partnership->status_id==22)
        {

        }
        else
        {
            return response()->json([
                'success' => false,
                'data' =>'error',
            ], 400);

        }

    }
    else
    {
        return response()->json([
            'success' => false,
            'data' =>'NotFoundPartnershipWithThisCompany',
        ], 400);

    }
      $order = new Order;
      $order->merchant_id=$user->merchant->id;
      $order->delivery_comp_id = $request->delivery_comp_id;
      $order->customer_id  = $request->customer_id ;
      $order->delivery_price_id=$request->delivery_price_id;
      $order->product_price=$request->product_price;
      $order->serial_number=343;
      $order->status_id=9;
      $order->order_description=$request->order_description;
      
      $order->save();
        return response()->json([
            'success' => true,
            'data' => null,
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderResource
     */
    

     public function GetDeliveryCompanyOrders()
     {
        $user = JWTAuth::parseToken()->authenticate();
          $order=Order::where('delivery_comp_id','=',$user->DeliveryCompany->id)->orderBy('id','DESC')->paginate(15);
          return  new OrderCollection($order);

     }


     public function GetDriverOrders()
     {
        $user = JWTAuth::parseToken()->authenticate();
          $order=Order::where('delivery_comp_id','=',$user->DeliveryCompany->id)->get();
          return  new OrderCollection($order);

     }

     public function ChangeStatusByDeliveryComp(Request $request)
     {

        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'order_id' => 'array',
            'status_id'=>'required|numeric'
            ]);

            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'Data' =>  $validator->messages()
                ], 400);

                }
       

        for($i=0;$i<count($request->order_id);$i++)
        {
        $order=Order::where('id','=',$request->order_id[$i])->where('delivery_comp_id','=',$user->DeliveryCompany->id)->first();
        $order->status_id=$request->status_id;
        $order->save();
        }

        return response()->json([
            'success' => true,
            'data' => null,
        ], 200);


     }
    public function show(Order $order)
    {
        $this->authorize('view', $order);

        return new OrderResource($order);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderResource
     */
    public function update(OrderRequest $request, Order $order)
        {
            $validator = Validator::make($request->all(), Order::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
        $order = Order::find($request->order_id);
        $order->order_id = $order_id;
        $order->action_id = $request->action_id;
        $order->status_id = $request->status_id;
        $order->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderResource
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);

        $order->delete();

        return new OrderResource($order);

    }
    public function changeStatus($statusId, $userId)
    {
        $u = Order::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }
}
