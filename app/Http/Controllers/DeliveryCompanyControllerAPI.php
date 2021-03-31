<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\DeliveryCompany;
use App\Models\CompanyDrivers;
use App\Models\Partnership;
use App\Http\Resources\CompanyDriversResource;
use Validator;
use App\Models\Order;
use App\Http\Resources\DeliveryCompanyResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryCompanyRequest;
use App\Http\Resources\Collections\DeliveryCompanyCollection;
use App\Http\Resources\Collections\CompanyDriversCollection;
use App\Http\Resources\PartnershipResource;
use App\Http\Resources\Collections\PartnershipCollection;

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


    public function Dashbourd()
    {
        $user = JWTAuth::parseToken()->authenticate();
     
        $count = [
            'ordersAll' => Order::where('delivery_comp_id','=',$user->DeliveryCompany->id)->count(),
            'ordersBind' => Order::where('delivery_comp_id','=',$user->DeliveryCompany->id)->where('status_id','=',9)->count(),
            'DriverAll'=>CompanyDrivers::where('delivery_comp_id','=',$user->DeliveryCompany->id)->count(),
            'OwnerAll'=>Partnership::where('delivery_comp_id','=',$user->DeliveryCompany->id)->count(),
        ];
        return response()->json([
            'success' => true,
            'data' => $count,
        ], 200);

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
        $request->request->add([ 'role_id' =>2]);
           
       

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
        
        
        $company = new DeliveryCompany;
        $company->user_id = $user['data']->id;;
        $company->delivery_comp_barnd_name = $request->delivery_comp_barnd_name;
        $company->delivery_comp_email = ($request->delivery_comp_email) ? $request->delivery_comp_email : 'null';
        $company->delivery_comp_phone = $request->delivery_comp_phone;
        $company->region_id = $request->region_id;
        $company->delivery_comp_description =($request->delivery_comp_description) ? $request->delivery_comp_description : 'null';
        $company->status_id = 1;
        $company->save();
        return response()->json([
            'success' => true,
            'token' => $user['token'],
        ], 200);

    }

    public function show()
    {
        $user = JWTAuth::parseToken()->authenticate();
        
        return response()->json([
            'success' => true,
            'data' =>new DeliveryCompanyResource($user->DeliveryCompany) ,
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
        $user  = app(UserControllerAPI::class)->update($request);


   

      
        $company = DeliveryCompany::where('user_id','=',$user['data']->id)->first();
        $company->delivery_comp_barnd_name = $request->delivery_comp_barnd_name;
        $company->delivery_comp_email = ($request->delivery_comp_email) ? $request->delivery_comp_email : 'null';
        //$company->delivery_comp_phone = $request->delivery_comp_phone;
        $company->delivery_comp_description =($request->delivery_comp_description) ? $request->delivery_comp_description : 'null';
       // $company->status_id = $request->status_id;
        $company->save();
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

    public function GetAllDrivers()
    {
        $user = JWTAuth::parseToken()->authenticate();

    
        return response()->json([
            'success' => true,
            'data' => new CompanyDriversCollection( CompanyDrivers::where('delivery_comp_id','=',$user->DeliveryCompany->id)->paginate(20)),
        ], 200);
     
  
   

    }


    public function GetMerchants()
    {

        
        $user = JWTAuth::parseToken()->authenticate();
        return new PartnershipCollection(Partnership::where('delivery_comp_id','=',$user->DeliveryCompany->id)->paginate(20));
   

    }




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
