<?php

namespace App\Http\Controllers;

use App\Models\CompanyDrivers;
use App\Http\Resources\CompanyDriversResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyDriversRequest;
use App\Http\Resources\Collections\CompanyDriversCollection;
use Illuminate\Http\Request;
use JWTAuth;
use Validator;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Partnership;

class CompanyDriversControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\CompanyDriversCollection
     */
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $companyDrivers = CompanyDrivers::with(['driver','deliveryComp'])
        ->where('delivery_comp_id',$user->deliveryComp->id);

        return new CompanyDriversCollection($companyDrivers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyDriversRequest  $request
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), CompanyDrivers::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
                $user = JWTAuth::parseToken()->authenticate();

                $CompanyDriv=CompanyDrivers::where('driver_id','=',$request->driver_id)->where('delivery_comp_id','=',$user->DeliveryCompany->id)->get();
                if(count($CompanyDriv)>0)
                {
                    return response()->json([
                        'success' => false,
                        'data' => 'Driver_is_Exist',
                    ], 200);

                }

                $companyDrivers= new CompanyDrivers;
                $companyDrivers->delivery_comp_id= $user->DeliveryCompany->id;
                $companyDrivers->driver_id =$request->driver_id;
                $companyDrivers->status_id =24;
                $companyDrivers->save();

                    return response()->json([
                        'success' => true,
                        'data' => 'done',
                    ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return \App\Http\Resources\CompanyDriversResource
     */


    public function SearchByDeliveryCom(Request $request)
    {

        $user = JWTAuth::parseToken()->authenticate();
        $items = QueryBuilder::for(CompanyDrivers::class)
        ->where('delivery_comp_id','=',$user->DeliveryCompany->id)
        ->allowedFilters(['id','status_id','driver.driver_phone'])
        ->paginate(15);
       return new  CompanyDriversCollection($items);
       

    }


    public function SearchByDriver(Request $request)
    {

        $user = JWTAuth::parseToken()->authenticate();
        $items = QueryBuilder::for(CompanyDrivers::class)
        ->where('driver_id','=',$user->driver->id)
        ->allowedFilters(['id','status_id','driver.driver_phone'])
        ->paginate(15);
       return new  CompanyDriversCollection($items);
       

    }

    public function changeStatus(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $CompanyDriv=CompanyDrivers::where('driver_id','=',$request->driver_id)->where('delivery_comp_id','=',$user->DeliveryCompany->id)->get();
        if(count($CompanyDriv)>0)
        {
            $CompanyDriv[0]->status_id=$request->status_id;
            $CompanyDriv[0]->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);
           
        }

    }
//
public function changeStatusByDriver(Request $request)
{

    $validator = Validator::make($request->all(), [
        'id' => 'required|numeric',
        'status_id'=>'required|numeric'

    ]);


   
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'data' => $validator->messages(),
        ], 400);
    }


    $user = JWTAuth::parseToken()->authenticate();
    $CompanyDriv=CompanyDrivers::where('id','=',$request->id)->where('driver_id','=',$user->driver->id)->get();
    if(count($CompanyDriv)>0)
    {
        $CompanyDriv[0]->status_id=$request->status_id;
        $CompanyDriv[0]->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);
       
    }

}



    public function show(CompanyDrivers $companyDrivers)
    {
        $this->authorize('view', $companyDrivers);

        return new CompanyDriversResource($companyDrivers);

    }


    

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyDriversRequest  $request
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return \App\Http\Resources\CompanyDriversResource
     */

  

    public function update(CompanyDriversRequest $request, CompanyDrivers $companyDrivers)
    {
        $this->authorize('update', $companyDrivers);

        $companyDrivers->update($request->validated());

        return new CompanyDriversResource($companyDrivers);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return \App\Http\Resources\CompanyDriversResource
     */
    public function destroy(CompanyDrivers $companyDrivers)
    {
        $this->authorize('delete', $companyDrivers);

        $companyDrivers->delete();

        return new CompanyDriversResource($companyDrivers);

    }
}
