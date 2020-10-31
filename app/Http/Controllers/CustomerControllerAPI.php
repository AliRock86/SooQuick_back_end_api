<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\Collections\CustomerCollection;

class CustomerControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\CustomerCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Customer::class);

        $customer = Customer::all();

        return new CustomerCollection($customer);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CustomerRequest  $request
     * @return \App\Http\Resources\CustomerResource
     */
    public function store(CustomerRequest $request)
    {
        $this->authorize('create', Customer::class);

        $customer = Customer::create($request->validated());

        return new CustomerResource($customer);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \App\Http\Resources\CustomerResource
     */
    public function show(Customer $customer)
    {
        $this->authorize('view', $customer);

        return new CustomerResource($customer);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CustomerRequest  $request
     * @param  \App\Customer  $customer
     * @return \App\Http\Resources\CustomerResource
     */
    public function update(Request $request)
    {
        //$this->authorize('update', $customer);
        $validator = Validator::make($request->all(), Customer::VALIDATION_RULE_UPDATE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
         Customer::find($request->id)->update($request->all());

        return response()->json([
            'success' => true,
            'data' => null,
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \App\Http\Resources\CustomerResource
     */
    public function destroy(Customer $customer)
    {
        $this->authorize('delete', $customer);

        $customer->delete();

        return new CustomerResource($customer);

    }
}
