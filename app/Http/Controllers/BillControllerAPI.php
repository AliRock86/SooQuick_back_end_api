<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Merchant;
use App\Models\BillsOrders;
use App\Http\Resources\BillsResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use JWTAuth;
use Validator;
use App\Http\Resources\Collections\BillsCollection;

class BillControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\BillsCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Bill::class);

        $bill = Bill::all();

        return new BillsCollection($bill);

    }

    public function GeyByDeliveryCompanyId(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $bill=Bill::where('delivery_comp_id','=',$user->DeliveryCompany->id)->paginate(15);
        return new BillsCollection($bill);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BillRequest  $request
     * @return \App\Http\Resources\BillsResource
     */


    public function store(Request $request)
    {
       
         
        $validator = Validator::make($request->all(), Bill::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }

                    $Merchant=Merchant::find($request->user_id);
      
                    DB::beginTransaction();
                     try {
                         
                    $user = JWTAuth::parseToken()->authenticate();
                    $bill= new Bill;
                    $bill->order_number =$request->order_number;
                    $bill->user_type =1;
                    $bill->delivery_cost =$request->delivery_cost;
                    $bill->totlal_cost =$request->totlal_cost;
                    $bill->delivery_comp_id=$user->DeliveryCompany->id;
                    $bill->user_id =$Merchant->user->id;
                    $bill->bill_type_id=$request->bill_type_id;
                    $bill->status_id =21;
                    $bill->save();
                    for($i=0;$i<count($request->orders_id);$i++)
                    {
                        $BillsOrders=new BillsOrders();
                        $BillsOrders->bill_id=$bill->id;
                        $BillsOrders->order_id=$request->orders_id[$i];
                        $BillsOrders->save();
                    }
                    DB::commit();
                        return response()->json([
                            'success' => true,
                            'data' => 'done',
                        ], 200);

                    }
                    catch (\Exception $e) {
                   DB::rollback();
                   return response()->json([
                       'success' => false,
                       'data' => $e->getMessage(),
                      
                   ], 400);


                   }
           

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \App\Http\Resources\BillsResource
     */
    public function show(Bill $bill)
    {
        // $this->authorize('view', $bill);

         return new BillResource($bill);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BillRequest  $request
     * @param  \App\Bill  $bill
     * @return \App\Http\Resources\BillsResource
     */
    public function update(BillRequest $request, Bill $bill)
    {
        $this->authorize('update', $bill);

        $bill->update($request->validated());

        return new BillsResource($bill);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \App\Http\Resources\BillsResource
     */


    public function SearchByDeliveryCom(Request $request)
    {

        $user = JWTAuth::parseToken()->authenticate();

        $items = QueryBuilder::for(Bill::class)
        ->where('delivery_comp_id','=',$user->DeliveryCompany->id)
        ->allowedFilters(['id','status_id','bill_type_id'])
        ->paginate(15);

        return response()->json([
            'success' => true,
            'data' =>new BillsCollection($items),
           
        ], 200);
   
       

    }



    public function destroy($bill_id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $bill= Bill::where('id','=',$bill_id)->where('delivery_comp_id','=',$user->DeliveryCompany->id)->get();
       
        if(count($bill)>0 && $bill[0]->status_id==21)
        {
            $bill[0]->delete();

        }
        

      

    }
}
