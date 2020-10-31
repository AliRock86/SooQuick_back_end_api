<?php

namespace App\Http\Controllers;

use App\Otp;
use App\Http\Resources\OtpResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\OtpRequest;
use App\Http\Resources\Collections\OtpCollection;

class OtpControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\OtpCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Otp::class);

        $otp = Otp::all();

        return new OtpCollection($otp);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OtpRequest  $request
     * @return \App\Http\Resources\OtpResource
     */
    public function store(OtpRequest $request)
    {
        $this->authorize('create', Otp::class);

        $otp = Otp::create($request->validated());

        return new OtpResource($otp);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Otp  $otp
     * @return \App\Http\Resources\OtpResource
     */
    public function show(Otp $otp)
    {
        $this->authorize('view', $otp);

        return new OtpResource($otp);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OtpRequest  $request
     * @param  \App\Otp  $otp
     * @return \App\Http\Resources\OtpResource
     */
    public function update(OtpRequest $request, Otp $otp)
    {
        $this->authorize('update', $otp);

        $otp->update($request->validated());

        return new OtpResource($otp);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Otp  $otp
     * @return \App\Http\Resources\OtpResource
     */
    public function destroy(Otp $otp)
    {
        $this->authorize('delete', $otp);

        $otp->delete();

        return new OtpResource($otp);

    }
}
