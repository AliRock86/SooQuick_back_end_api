<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Http\Resources\DriverResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Http\Resources\Collections\DriverCollection;

class DriverControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\DriverCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Driver::class);

        $driver = Driver::all();

        return new DriverCollection($driver);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DriverRequest  $request
     * @return \App\Http\Resources\DriverResource
     */
    public function store(DriverRequest $request)
    {
        $this->authorize('create', Driver::class);

        $driver = Driver::create($request->validated());

        return new DriverResource($driver);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \App\Http\Resources\DriverResource
     */
    public function show(Driver $driver)
    {
        $this->authorize('view', $driver);

        return new DriverResource($driver);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DriverRequest  $request
     * @param  \App\Driver  $driver
     * @return \App\Http\Resources\DriverResource
     */
    public function update(DriverRequest $request, Driver $driver)
    {
        $this->authorize('update', $driver);

        $driver->update($request->validated());

        return new DriverResource($driver);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \App\Http\Resources\DriverResource
     */
    public function destroy(Driver $driver)
    {
        $this->authorize('delete', $driver);

        $driver->delete();

        return new DriverResource($driver);

    }
}
