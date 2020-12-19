<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Organizer\OrganizerResource;
use App\Http\Resources\Organizer\OrganizerCollection;
use App\Http\Requests\Organizer\OrganizerStoreRequest;
use App\Http\Requests\Organizer\OrganizerUpdateRequest;

class OrganizerController extends Controller
{
    public function index()
    {
        return OrganizerCollection::collection(Organizer::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(OrganizerStoreRequest $request)
    {
        $organizer = new Organizer;
        $organizer->name = $request->name;
        $organizer->job = $request->job;
        $organizer->avatar = $request->file('avatar')->store('public');
        $organizer->save();

        return response()->json([
            'data' => new OrganizerResource($organizer)
        ], Response::HTTP_CREATED);
    }

    public function show(Organizer $organizer)
    {
        return new OrganizerResource($organizer);
    }

    public function edit(Organizer $organizer)
    {
        //
    }

    public function update(OrganizerUpdateRequest $request, Organizer $organizer)
    {
        if($request->has('name'))
            $organizer->name = $request->name;
        if($request->has('job'))
            $organizer->job = $request->job;
        if($request->has('avatar')) {
            unlink(storage_path("app/$organizer->avatar"));
            $organizer->avatar = $request->file('avatar')->store('public');
        }
        $organizer->save();

        return response()->json([
            'data' => new OrganizerResource($organizer)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Organizer $organizer)
    {
        // unlink(storage_path("app/$organizer->avatar"));
        $organizer->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
