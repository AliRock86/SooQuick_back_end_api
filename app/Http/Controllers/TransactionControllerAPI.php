<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Resources\TransactionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\Collections\TransactionCollection;

class TransactionControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\TransactionCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Transaction::class);

        $transaction = Transaction::all();

        return new TransactionCollection($transaction);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TransactionRequest  $request
     * @return \App\Http\Resources\TransactionResource
     */
    public function store(TransactionRequest $request)
    {
        $this->authorize('create', Transaction::class);

        $transaction = Transaction::create($request->validated());

        return new TransactionResource($transaction);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \App\Http\Resources\TransactionResource
     */
    public function show(Transaction $transaction)
    {
        $this->authorize('view', $transaction);

        return new TransactionResource($transaction);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \App\Http\Resources\TransactionResource
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $this->authorize('update', $transaction);

        $transaction->update($request->validated());

        return new TransactionResource($transaction);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \App\Http\Resources\TransactionResource
     */
    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return new TransactionResource($transaction);

    }
}
