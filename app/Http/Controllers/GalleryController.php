<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Gallery\GalleryResource;
use App\Http\Resources\Gallery\GalleryCollection;
use App\Http\Requests\Gallery\GalleryStoreRequest;
use App\Http\Requests\Gallery\GalleryUpdateRequest;

class GalleryController extends Controller
{
    public function index()
    {
        return GalleryCollection::collection(Gallery::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(GalleryStoreRequest $request)
    {
        $gallery = new Gallery;
        $gallery->category_id = $request->category_id;
        $gallery->description = $request->description;
        $gallery->photo = $request->file('photo')->store('public');
        $gallery->save();

        return response()->json([
            'data' => new GalleryResource($gallery)
        ], Response::HTTP_CREATED);
    }

    public function show(Gallery $gallery)
    {
        return new GalleryResource($gallery);
    }

    public function edit(Gallery $gallery)
    {
        //
    }

    public function update(GalleryUpdateRequest $request, Gallery $gallery)
    {
        if($request->has('category_id'))
            $gallery->category_id = $request->category_id;
        if($request->has('description'))
            $gallery->description = $request->description;
        if($request->has('photo')) {
            unlink(storage_path("app/$gallery->photo"));
            $gallery->photo = $request->file('photo')->store('public');
        }
        $gallery->save();

        return response()->json([
            'data' => new GalleryResource($gallery)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Gallery $gallery)
    {
        // unlink(storage_path("app/$gallery->photo"));
        $gallery->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
