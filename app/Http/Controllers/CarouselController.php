<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Carousel\CarouselResource;
use App\Http\Resources\Carousel\CarouselCollection;
use App\Http\Requests\Carousel\CarouselStoreRequest;
use App\Http\Requests\Carousel\CarouselUpdateRequest;

class CarouselController extends Controller
{
    public function index()
    {
        return CarouselCollection::collection(Carousel::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(CarouselStoreRequest $request)
    {
        $carousel = new Carousel;
        $carousel->title = $request->title;
        $carousel->description = $request->description;
        $carousel->photo = $request->file('photo')->store('public');
        $carousel->save();

        return response()->json([
            'data' => new CarouselResource($carousel)
        ], Response::HTTP_CREATED);
    }

    public function show(Carousel $carousel)
    {
        return new CarouselResource($carousel);
    }

    public function edit(Carousel $carousel)
    {
        //
    }

    public function update(CarouselUpdateRequest $request, Carousel $carousel)
    {
        if($request->has('title'))
            $carousel->title = $request->title;
        if($request->has('description'))
            $carousel->description = $request->description;
        if($request->has('photo')) {
            unlink(storage_path("app/$carousel->photo"));
            $carousel->photo = $request->file('photo')->store('public');
        }
        $carousel->save();

        return response()->json([
            'data' => new CarouselResource($carousel)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Carousel $carousel)
    {
        unlink(storage_path("app/$carousel->photo"));
        $carousel->forceDelete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
