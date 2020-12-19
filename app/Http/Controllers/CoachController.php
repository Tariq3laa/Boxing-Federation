<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use App\Http\Resources\Coach\CoachResource;
use App\Http\Resources\Coach\CoachCollection;
use App\Http\Requests\Coach\CoachStoreRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Coach\CoachUpdateRequest;

class CoachController extends Controller
{
    public function index()
    {
        return CoachCollection::collection(Coach::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(CoachStoreRequest $request)
    {
        $coach = new Coach;
        $coach->name = $request->name;
        $coach->bio = $request->bio;
        $coach->club = $request->club;
        $coach->avatar = $request->file('avatar')->store('public');
        $coach->save();

        return response()->json([
            'data' => new CoachResource($coach)
        ], Response::HTTP_CREATED);
    }

    public function show(Coach $coach)
    {
        return new CoachResource($coach);
    }

    public function edit(Coach $coach)
    {
        //
    }

    public function update(CoachUpdateRequest $request, Coach $coach)
    {
        if($request->has('name'))
            $coach->name = $request->name;
        if($request->has('bio'))
            $coach->bio = $request->bio;
        if($request->has('club'))
            $coach->club = $request->club;
        if($request->has('avatar')) {
            unlink(storage_path("app/$coach->avatar"));
            $coach->avatar = $request->file('avatar')->store('public');
        }
        $coach->save();

        return response()->json([
            'data' => new CoachResource($coach)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Coach $coach)
    {
        // unlink(storage_path("app/$coach->avatar"));
        $coach->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
