<?php

namespace App\Http\Controllers;

use App\Models\DeliveryCompany;
use App\Http\Resources\DeliveryCompanyResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryCompanyRequest;
use App\Http\Resources\Collections\DeliveryCompanyCollection;

class DeliveryCompanyControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DeliveryCompanyCollection
     */
    public function index()
    {
        $this->authorize('viewAny', DeliveryCompany::class);

        $deliveryCompany = DeliveryCompany::all();

        return new DeliveryCompanyCollection($deliveryCompany);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DeliveryCompanyRequest  $request
     * @return \App\Http\Resources\DeliveryCompanyResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), DeliveryCompany::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
            
            $deliveryCompany= new  DeliveryCompany ;
            $deliveryCompany->user_id=$user_id;
            $deliveryCompany->delivery_comp_barnd_name= $request->delivery_comp_barnd_name;
            $deliveryCompany->delivery_comp_email = $request->delivery_comp_email;
            $deliveryCompany->delivery_comp_phone = $request->delivery_comp_phone;
            $deliveryCompany->delivery_comp_description= $request->delivery_comp_description;
            $deliveryCompany->status_id = $request->status_id;
            $deliveryCompany->save();
            
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);

    }


    public function update(DeliveryCompanyRequest $request , DeliveryCompany $deliveryCompany )
    {
        $validator = Validator::make($request->all(), DeliveryCompany::VALIDATION_RULE_UPDATE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
            $deliveryCompany = DeliveryCompany::find($request->company_id);
            $deliveryCompany->user_id=$user_id;
            $deliveryCompany->delivery_comp_barnd_name= $request->delivery_comp_barnd_name;
            $deliveryCompany->delivery_comp_email = $request->delivery_comp_email;
            $deliveryCompany->delivery_comp_phone = $request->delivery_comp_phone;
            $deliveryCompany->delivery_comp_description= $request->delivery_comp_description;
            $deliveryCompany->status_id = $request->status_id;
            $deliveryCompany->save();
            
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryCompany  $deliveryCompany
     * @return \App\Http\Resources\DeliveryCompanyResource
     */
    public function destroy(DeliveryCompany $deliveryCompany)
    {
        $this->authorize('delete', $deliveryCompany);

        $deliveryCompany->delete();

        return new DeliveryCompanyResource($deliveryCompany);

    }
    public function changeStatus($statusId, $userId)
    {
        $u = DeliveryCompany::find($userId);
        $u->status_id = $statusId;
        $u->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }
}
