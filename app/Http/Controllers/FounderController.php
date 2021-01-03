<?php

namespace App\Http\Controllers;

use App\Models\Founder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Founder\FounderResource;
use App\Http\Resources\Founder\FounderCollection;
use App\Http\Requests\Founder\FounderStoreRequest;
use App\Http\Requests\Founder\FounderUpdateRequest;

class FounderController extends Controller
{
    public function index()
    {
        return FounderCollection::collection(Founder::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(FounderStoreRequest $request)
    {
        $founder = new Founder;
        $founder->name = $request->name;
        $founder->club = $request->club;
        $founder->avatar = $request->file('avatar')->store('public');
        $founder->save();

        return response()->json([
            'data' => new FounderResource($founder)
        ], Response::HTTP_CREATED);
    }

    public function show(Founder $founder)
    {
        return new FounderResource($founder);
    }

    public function edit(Founder $founder)
    {
        //
    }

    public function update(FounderUpdateRequest $request, Founder $founder)
    {
        if($request->has('name'))
            $founder->name = $request->name;
        if($request->has('club'))
            $founder->club = $request->club;
        if($request->has('avatar')) {
            unlink(storage_path("app/$founder->avatar"));
            $founder->avatar = $request->file('avatar')->store('public');
        }
        $founder->save();

        return response()->json([
            'data' => new FounderResource($founder)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Founder $founder)
    {
        unlink(stokrage_path("app/$founder->avatar"));
        $founder->forceDelete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
