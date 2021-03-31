<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Resources\WalletResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\WalletRequest;
use App\Http\Resources\Collections\WalletCollection;

class WalletControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\WalletCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Wallet::class);

        $wallet = Wallet::all();

        return new WalletCollection($wallet);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WalletRequest  $request
     * @return \App\Http\Resources\WalletResource
     */
    public function store(WalletRequest $request)
    {
        $validator = Validator::make($request->all(), Wallet::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
     
       $wallet = new Wallet;
       $wallet->user_id = $user->id;
       $wallet->transaction_id = $request->transaction_id;
       $wallet->value = $request->value;
       $wallet->added = $request->added;
       $wallet->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \App\Http\Resources\WalletResource
     */
    public function show(Wallet $wallet)
    {
        $this->authorize('view', $wallet);

        return new WalletResource($wallet);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WalletRequest  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \App\Http\Resources\WalletResource
     */
    public function update(WalletRequest $request, Wallet $wallet)
    {
        $validator = Validator::make($request->all(), Wallet::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
     
       $wallet = Wallet::find($request->wallet_id);
       $wallet->user_id = $user->id;
       $wallet->transaction_id = $request->transaction_id;
       $wallet->value = $request->value;
       $wallet->added = $request->added;
       $wallet->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \App\Http\Resources\WalletResource
     */
    public function destroy(Wallet $wallet)
    {
        $this->authorize('delete', $wallet);

        $wallet->delete();

        return new WalletResource($wallet);

    }
}
