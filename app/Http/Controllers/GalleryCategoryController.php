<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Gallery\CategoryResource;
use App\Http\Resources\Gallery\GalleryCollection;
use App\Http\Resources\Gallery\CategoryCollection;
use App\Http\Requests\Gallery\CategoryStoreRequest;
use App\Http\Requests\Gallery\CategoryUpdateRequest;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        return CategoryCollection::collection(GalleryCategory::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(CategoryStoreRequest $request)
    {
        $galleryCategory = new galleryCategory;
        $galleryCategory->name = $request->name;
        $galleryCategory->save();

        return response()->json([
            'data' => new CategoryResource($galleryCategory)
        ], Response::HTTP_CREATED);
    }

    public function show(GalleryCategory $category)
    {
        return new CategoryResource($category);
    }

    public function edit(GalleryCategory $category)
    {
        //
    }

    public function update(CategoryUpdateRequest $request, GalleryCategory $category)
    {
        if($request->has('name'))
            $category->name = $request->name;
        $category->save();

        return response()->json([
            'data' => new CategoryResource($category)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(GalleryCategory $category)
    {
        $category->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function categoryGallery(GalleryCategory $category)
    {
        return GalleryCollection::collection($category->gallery()->paginate(10));
    }
}
