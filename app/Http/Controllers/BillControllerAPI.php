<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Http\Resources\BillResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Http\Resources\Collections\BillCollection;

class BillControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\BillCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Bill::class);

        $bill = Bill::all();

        return new BillCollection($bill);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BillRequest  $request
     * @return \App\Http\Resources\BillResource
     */
    public function store(BillRequest $request)
    {
        $this->authorize('create', Bill::class);

        $bill = Bill::create($request->validated());

        return new BillResource($bill);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \App\Http\Resources\BillResource
     */
    public function show(Bill $bill)
    {
        $this->authorize('view', $bill);

        return new BillResource($bill);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BillRequest  $request
     * @param  \App\Bill  $bill
     * @return \App\Http\Resources\BillResource
     */
    public function update(BillRequest $request, Bill $bill)
    {
        $this->authorize('update', $bill);

        $bill->update($request->validated());

        return new BillResource($bill);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \App\Http\Resources\BillResource
     */
    public function destroy(Bill $bill)
    {
        $this->authorize('delete', $bill);

        $bill->delete();

        return new BillResource($bill);

    }
}
