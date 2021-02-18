<?php

namespace App\Http\Controllers;

use App\Model\Permision;
use App\Http\Resources\PermisionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermisionRequest;
use App\Http\Resources\Collections\PermisionCollection;

class PermisionControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\PermisionCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Permision::class);

        $permision = Permision::all();

        return new PermisionCollection($permision);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PermisionRequest  $request
     * @return \App\Http\Resources\PermisionResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Permision::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
      
     
        $permision= new Permision;
        $permision->user_id =$user_id;
        $permision->permision_name = $request->permision_name;
        $permision->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Permision  $permision
     * @return \App\Http\Resources\PermisionResource
     */
    public function show(Permision $permision)
    {
        $this->authorize('view', $permision);

        return new PermisionResource($permision);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PermisionRequest  $request
     * @param  \App\Permision  $permision
     * @return \App\Http\Resources\PermisionResource
     */
    public function update(PermisionRequest $request, Permision $permision)
    {
            $validator = Validator::make($request->all(), Permision::VALIDATION_RULE_STORE);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->messages(),
                ], 400);
            }
        
        
                $permision= Permision::find($request->permision_id);
                $permision->user_id =$user_id;
                $permision->permision_name = $request->permision_name;
                $permision->save();
                        return response()->json([
                            'success' => true,
                            'data' => 'done',
                        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permision  $permision
     * @return \App\Http\Resources\PermisionResource
     */
    public function destroy(Permision $permision)
    {
        $this->authorize('delete', $permision);

        $permision->delete();

        return new PermisionResource($permision);

    }
}
