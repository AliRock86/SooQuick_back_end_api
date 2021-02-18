<?php

namespace App\Http\Controllers;

use App\Model\Merchant;
use App\Http\Resources\MerchantResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\MerchantRequest;
use App\Http\Resources\Collections\MerchantCollection;

class MerchantControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\MerchantCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Merchant::class);

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
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'data' => $validator->messages(),
                    ], 400);
                }
                
                    
                $merchant = new Merchant;
                $merchant->user_id = $user_id;
                $merchant->merchant_barnd_name = $request->merchant_barnd_name;
                $merchant->merchant_email =$request->merchant_email;
                $merchant->merchant_phone =$request->merchant_phone;
                $merchant->merchant_description =$request->merchant_description;
                $merchant->facebook_url =$request->facebook_url;
                $merchant->offer =$request->offer;
                $merchant->save();
                        return response()->json([
                            'success' => true,
                            'data' => 'done',
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
        $this->authorize('view', $merchant);

        return new MerchantResource($merchant);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MerchantRequest  $request
     * @param  \App\Merchant  $merchant
     * @return \App\Http\Resources\MerchantResource
     */
    public function update(MerchantRequest $request, Merchant $merchant)
    {
      
        $validator = Validator::make($request->all(), Merchant::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
            
                
              $merchant = Merchant::find($request->merchant_id);
              $merchant->user_id = $user_id;
              $merchant->merchant_barnd_name = $request->merchant_barnd_name;
              $merchant->merchant_email =$request->merchant_email;
              $merchant->merchant_phone =$request->merchant_phone;
              $merchant->merchant_description =$request->merchant_description;
              $merchant->facebook_url =$request->facebook_url;
              $merchant->offer =$request->offer;
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
