<?php

namespace App\Http\Controllers;

use App\Model\Otp;
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
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), Otp::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
        $Otp= new Otp;
        $otp->user_id =$user_id;
        $otp->verify_number = $request->verify_number;
        $otp->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);

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
        $validator = Validator::make($request->all(), Otp::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
        $Otp= Otp::find($request->Otp_id);
        $otp->user_id =$user_id;
        $otp->verify_number = $request->verify_number;
        $otp->save();
            return response()->json([
                'success' => true,
                'data' => 'done',
            ], 200);


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
