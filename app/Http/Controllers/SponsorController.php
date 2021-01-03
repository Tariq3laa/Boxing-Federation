<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Sponsor\SponsorResource;
use App\Http\Resources\Sponsor\SponsorCollection;
use App\Http\Requests\Sponsor\SponsorStoreRequest;
use App\Http\Requests\Sponsor\SponsorUpdateRequest;

class SponsorController extends Controller
{
    public function index()
    {
        return SponsorCollection::collection(Sponsor::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(SponsorStoreRequest $request)
    {
        $sponsor = new Sponsor;
        $sponsor->name = $request->name;
        $sponsor->bio = $request->bio;
        $sponsor->avatar = $request->file('avatar')->store('public');
        $sponsor->save();

        return response()->json([
            'data' => new SponsorResource($sponsor)
        ], Response::HTTP_CREATED);
    }

    public function show(Sponsor $sponsor)
    {
        return new SponsorResource($sponsor);
    }

    public function edit(Sponsor $sponsor)
    {
        //
    }

    public function update(SponsorUpdateRequest $request, Sponsor $sponsor)
    {
        if($request->has('name'))
            $sponsor->name = $request->name;
        if($request->has('bio'))
            $sponsor->bio = $request->bio;
        if($request->has('avatar')) {
            unlink(storage_path("app/$sponsor->avatar"));
            $sponsor->avatar = $request->file('avatar')->store('public');
        }
        $sponsor->save();

        return response()->json([
            'data' => new SponsorResource($sponsor)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Sponsor $sponsor)
    {
        unlink(storage_path("app/$sponsor->avatar"));
        $sponsor->forceDelete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
