<?php

namespace App\Http\Controllers;

use App\Models\Referee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Referee\RefereeResource;
use App\Http\Resources\Referee\RefereeCollection;
use App\Http\Requests\Referee\RefereeStoreRequest;
use App\Http\Requests\Referee\RefereeUpdateRequest;

class RefereeController extends Controller
{
    public function index()
    {
        return RefereeCollection::collection(Referee::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(RefereeStoreRequest $request)
    {
        $referee = new Referee;
        $referee->name = $request->name;
        $referee->club = $request->club;
        $referee->rating = $request->rating;
        $referee->avatar = $request->file('avatar')->store('public');
        $referee->save();

        return response()->json([
            'data' => new RefereeResource($referee)
        ], Response::HTTP_CREATED);
    }

    public function show(Referee $referee)
    {
        return new RefereeResource($referee);

    }

    public function edit(Referee $referee)
    {
        //
    }

    public function update(RefereeUpdateRequest $request, Referee $referee)
    {
        if($request->has('name'))
            $referee->name = $request->name;
        if($request->has('club'))
            $referee->club = $request->club;
        if($request->has('rating'))
            $referee->rating = $request->rating;
        if($request->has('avatar')) {
            unlink(storage_path("app/$referee->avatar"));
            $referee->avatar = $request->file('avatar')->store('public');
        }
        $referee->save();

        return response()->json([
            'data' => new RefereeResource($referee)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Referee $referee)
    {
        unlink(storage_path("app/$referee->avatar"));
        $referee->forceDelete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
