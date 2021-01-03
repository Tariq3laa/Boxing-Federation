<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Resources\Video\VideoResource;
use App\Http\Resources\Video\VideoCollection;
use App\Http\Requests\Video\VideoStoreRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Video\VideoUpdateRequest;

class VideoController extends Controller
{
    public function index()
    {
        return VideoCollection::collection(Video::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(VideoStoreRequest $request)
    {
        $video = new Video;
        $video->title = $request->title;
        $video->photo = $request->file('photo')->store('public');
        $video->video = $request->file('video')->store('public');
        $video->save();

        return response()->json([
            'data' => new VideoResource($video)
        ], Response::HTTP_CREATED);
    }

    public function show(Video $video)
    {
        return new VideoResource($video);
    }

    public function edit(Video $video)
    {
        //
    }

    public function update(VideoUpdateRequest $request, Video $video)
    {
        if($request->has('title'))
            $video->title = $request->title;
        if($request->has('photo')) {
            unlink(storage_path("app/$video->photo"));
            $video->photo = $request->file('photo')->store('public');
        }
        if($request->has('video')) {
            unlink(storage_path("app/$video->video"));
            $video->video = $request->file('video')->store('public');
        }
        $video->save();

        return response()->json([
            'data' => new VideoResource($video)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Video $video)
    {
        unlink(storage_path("app/$video->photo"));
        unlink(storage_path("app/$video->video"));
        $video->forceDelete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
