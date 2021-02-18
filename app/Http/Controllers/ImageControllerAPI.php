<?php

namespace App\Http\Controllers;

use App\Model\Image;
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
         
        $validator = Validator::make($request->all(), Image::VALIDATION_RULE_STORE);
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'data' => $validator->messages(),
                    ], 400);
                }
                
                    
                $image = new Image;
                $image->image_url = $image_url;
                $image->imageable_id = $request->imageable_id;
                $image->imageable_type =$request->imageable_type;
                $image->save();
                        return response()->json([
                            'success' => true,
                            'data' => 'done',
                        ], 200);

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
        $validator = Validator::make($request->all(), Image::VALIDATION_RULE_STORE);
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'data' => $validator->messages(),
                    ], 400);
                }
                
                    
                $image = Image::find($request->image_id);
                $image->image_url = $image_url;
                $image->imageable_id = $request->imageable_id;
                $image->imageable_type =$request->imageable_type;
                $image->save();
                return response()->json([
                    'success' => true,
                    'data' => 'done',
                ], 200);
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
