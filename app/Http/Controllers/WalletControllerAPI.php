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
        $this->authorize('create', Wallet::class);

        $wallet = Wallet::create($request->validated());

        return new WalletResource($wallet);

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
        $this->authorize('update', $wallet);

        $wallet->update($request->validated());

        return new WalletResource($wallet);

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
