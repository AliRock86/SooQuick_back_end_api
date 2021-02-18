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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Customer::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }
        $customer = new Customer;
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone_1 = $request->customer_phone_1;
        $customer->customer_phone_2 = $request->customer_phone_2;
        $customer->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

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
    public function update(CustomerRequest $request, Customer $customer )
    {
        $validator = Validator::make($request->all(), Customer::VALIDATION_RULE_STORE);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->messages(),
            ], 400);
        }

        $customer =  Customer::find($request->customer_id);
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone_1 = $request->customer_phone_1;
        $customer->customer_phone_2 = $request->customer_phone_2;
        $customer->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
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
