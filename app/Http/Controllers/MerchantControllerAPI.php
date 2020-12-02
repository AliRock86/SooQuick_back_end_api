<?php

namespace App\Http\Controllers;

use App\Merchant;
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
        $user = JWTAuth::parseToken()->authenticate();
        $merchant= new DeliveryCompany;
        $merchant->user_id = $user->id;
        $merchant->delivery_comp_barnd_name = $request->delivery_comp_barnd_name;
        $merchant->delivery_comp_email = ($request->delivery_comp_email) ? $request->delivery_comp_email : 'null';
        $merchant->delivery_comp_phone = $request->delivery_comp_phone;
        $merchant->delivery_comp_description =($request->delivery_comp_description) ? $request->delivery_comp_description : 'null';
        $merchant->status_id = 1;
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
        $this->authorize('update', $merchant);

        $merchant->update($request->validated());

        return new MerchantResource($merchant);

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
