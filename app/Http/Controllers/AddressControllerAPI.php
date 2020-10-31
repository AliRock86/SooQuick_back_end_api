<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Resources\AddressResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Resources\Collections\AddressCollection;

class AddressControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\AddressCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Address::class);

        $address = Address::all();

        return new AddressCollection($address);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AddressRequest  $request
     * @return \App\Http\Resources\AddressResource
     */
    public function store(AddressRequest $request)
    {
        $this->authorize('create', Address::class);

        $address = Address::create($request->validated());

        return new AddressResource($address);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \App\Http\Resources\AddressResource
     */
    public function show(Address $address)
    {
        $this->authorize('view', $address);

        return new AddressResource($address);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AddressRequest  $request
     * @param  \App\Address  $address
     * @return \App\Http\Resources\AddressResource
     */
    public function update(AddressRequest $request, Address $address)
    {
        $this->authorize('update', $address);

        $address->update($request->validated());

        return new AddressResource($address);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \App\Http\Resources\AddressResource
     */
    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);

        $address->delete();

        return new AddressResource($address);

    }
}
