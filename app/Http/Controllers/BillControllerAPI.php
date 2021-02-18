<?php

namespace App\Http\Controllers;

use App\Model\Bill;
use App\Http\Resources\BillResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Http\Resources\Collections\BillCollection;

class BillControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\BillCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Bill::class);

        $bill = Bill::all();

        return new BillCollection($bill);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BillRequest  $request
     * @return \App\Http\Resources\BillResource
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
      
                    
                    $bill= new Bill;
                    $bill->name =$name;
                    $bill->save();

                        return response()->json([
                            'success' => true,
                            'data' => 'done',
                        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \App\Http\Resources\BillResource
     */
    public function show(Bill $bill)
    {
        $this->authorize('view', $bill);

        return new BillResource($bill);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BillRequest  $request
     * @param  \App\Bill  $bill
     * @return \App\Http\Resources\BillResource
     */
    public function update(BillRequest $request, Bill $bill)                   

    {
            $validator = Validator::make($request->all(), Bill::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
                            
              $bill= Bill::find($request->bill_id);
              $bill->name =$name;
              $bill->save();

                return response()->json([
                        'success' => true,
                        'data' => 'done',
                        ], 200);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \App\Http\Resources\BillResource
     */
    public function destroy(Bill $bill)
    {
        $this->authorize('delete', $bill);

        $bill->delete();

        return new BillResource($bill);

    }
}
