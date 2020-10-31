<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Resources\ImageResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\Collections\ImageCollection;

class ImageControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\ImageCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Image::class);

        $image = Image::all();

        return new ImageCollection($image);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ImageRequest  $request
     * @return \App\Http\Resources\ImageResource
     */
    public function store(ImageRequest $request)
    {
        $this->authorize('create', Image::class);

        $image = Image::create($request->validated());

        return new ImageResource($image);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \App\Http\Resources\ImageResource
     */
    public function show(Image $image)
    {
        $this->authorize('view', $image);

        return new ImageResource($image);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ImageRequest  $request
     * @param  \App\Image  $image
     * @return \App\Http\Resources\ImageResource
     */
    public function update(ImageRequest $request, Image $image)
    {
        $this->authorize('update', $image);

        $image->update($request->validated());

        return new ImageResource($image);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \App\Http\Resources\ImageResource
     */
    public function destroy(Image $image)
    {
        $this->authorize('delete', $image);

        $image->delete();

        return new ImageResource($image);

    }
}
