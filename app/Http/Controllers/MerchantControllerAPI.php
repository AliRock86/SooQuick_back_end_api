<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use JWTAuth;
use App\Http\Resources\MerchantResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\MerchantRequest;
use App\Models\DeliveryCompany;
use App\Models\Merchant;
use App\Models\User;
use App\Http\Controllers\UserControllerAPI;
use App\Http\Resources\Collections\MerchantCollection;
use Validator;


class MerchantControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\MerchantCollection
     */
    public function index()
    {
     
        $merchant = Merchant::all();

        return new MerchantCollection($merchant);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MerchantRequest  $request
     * @return \App\Http\Resources\MerchantResource
     */
    public function store(Request $request)
    {

     

        $validator = Validator::make($request->all(), Merchant::VALIDATION_RULE_STORE);
        $request->request->add([ 'role_id' =>1]);
           
       

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

        $merchant= new Merchant;
        $merchant->user_id = $user['data']->id;
        $merchant->merchant_barnd_name = $request->merchant_barnd_name;
        $merchant->merchant_email = ($request->merchant_email) ? $request->merchant_email : 'null';
        $merchant->merchant_phone = $request->merchant_phone;
        $merchant->merchant_description =($request->merchant_description) ? $request->merchant_description : 'null';
       
        $merchant->save();

        return response()->json([
            'success' => true,
            'token' => $user['token'],
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Merchant  $merchant
     * @return \App\Http\Resources\MerchantResource
     */
    public function show(Merchant $merchant)
    {
        //$this->authorize('view', $merchant);

        return new MerchantResource($merchant);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MerchantRequest  $request
     * @param  \App\Merchant  $merchant
     * @return \App\Http\Resources\MerchantResource
     */
    public function update(Request $request,$merchant)
    {

        
      
        $validator = Validator::make($request->all(), Merchant::VALIDATION_RULE_UPDATE);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }

        $user = JWTAuth::parseToken()->authenticate();
        $user = User::where('user_id','=',$user->id)->first();
        if(!$user){
            return response()->json([
                'success' => false,
                'data' => 'Token Invalid',
            ], 400);
        }

        $user = JWTAuth::parseToken()->authenticate();
        $merchant= Merchant::find($merchant);
        $merchant->user_id = $user->id;
        $merchant->merchant_barnd_name = $request->merchant_barnd_name;
        $merchant->merchant_email = ($request->merchant_email) ? $request->merchant_email : 'null';
        $merchant->merchant_phone = $request->merchant_phone;
        $merchant->merchant_description =($request->merchant_description) ? $request->merchant_description : 'null';
        $merchant->save();

        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);
     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Merchant  $merchant
     * @return \App\Http\Resources\MerchantResource
     */
    public function destroy(Merchant $merchant)
    {
        $this->authorize('delete', $merchant);

        $merchant->delete();

        return new MerchantResource($merchant);

    }
}
