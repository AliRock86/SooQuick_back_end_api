<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use App\Http\Resources\PartnershipResource;
use App\Http\Resources\Collections\PartnershipCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnershipRequest;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use JWTAuth;
use Validator;


class PartnershipControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\PartnershipCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Partnership::class);

        $partnership = Partnership::all();

        return new PartnershipCollection($partnership);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PartnershipRequest  $request
     * @return \App\Http\Resources\PartnershipResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Partnership::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
        $user = JWTAuth::parseToken()->authenticate();


     $Partnerships=Partnership::where('delivery_comp_id','=',$request->delivery_comp_id)
     ->where('merchant_id','=',JWTAuth::parseToken()->authenticate()->merchant->id)
     ->get();
    if(count($Partnerships)>0)

    {
        return response()->json([
            'success' => false,
            'data' =>'this Partnerships is found',
        ], 400);
    }
 
    $partnership= new Partnership;
    $partnership->delivery_comp_id = $request->delivery_comp_id;
    $partnership->merchant_id = $user->merchant->id;
    $partnership->status_id =21;
    $partnership->save();

        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partnership  $partnership
     * @return \App\Http\Resources\PartnershipResource
     */
    public function show(Partnership $partnership)
    {
        $this->authorize('view', $partnership);

        return new PartnershipResource($partnership);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PartnershipRequest  $request
     * @param  \App\Partnership  $partnership
     * @return \App\Http\Resources\PartnershipResource
     */
    public function ChangStatusByDeliveryCom(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $Partnership=Partnership::where('id','=',$request->id)->where('delivery_comp_id','=',$user->DeliveryCompany->id)->first();
        $Partnership->status_id=$request->status_id;
        $Partnership->discount_value=(int)$request->discount_value;
        $Partnership->save();

        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);
    
       

    }



    public function SearchByDeliveryCom(Request $request)
    {

        $user = JWTAuth::parseToken()->authenticate();

        $items = QueryBuilder::for(Partnership::class)
        ->where('delivery_comp_id','=',$user->DeliveryCompany->id)
        ->allowedFilters(['id','status_id','merchant.merchant_phone'])
        ->paginate(15);
       return new  PartnershipCollection($items);
       

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partnership  $partnership
     * @return \App\Http\Resources\PartnershipResource
     */
    public function destroy(Partnership $partnership)
    {
        $this->authorize('delete', $partnership);

        $partnership->delete();

        return new PartnershipResource($partnership);

    }
}
