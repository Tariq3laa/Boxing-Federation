<?php

namespace App\Http\Controllers;

use App\Models\Tec;
use App\Models\Coach;
use Illuminate\Http\Request;
use App\Http\Resources\Tec\TecResource;
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
        $coach->email = $request->email;
        $coach->password = $request->password;
        // $coach->bio = $request->bio;
        $coach->club = $request->club;
        $coach->rating = $request->rating;
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
        if($request->has('email'))
            $coach->email = $request->email;
        if($request->has('password'))
            $coach->password = $request->password;
        // if($request->has('bio'))
        //     $coach->bio = $request->bio;
        if($request->has('club'))
            $coach->club = $request->club;
        if($request->has('rating'))
            $coach->club = $request->rating;
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
        unlink(storage_path("app/$coach->avatar"));
        $coach->forceDelete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function login(Request $request)
    {
        $coach = Coach::where('email', $request->email)->where('password', $request->password);
        $tec = Tec::where('email', $request->email)->where('password', $request->password);

        if($coach) {
            return response()->json([
                'type' => 'coach',
                'data' => new CoachResource($coach)
            ], Response::HTTP_ACCEPTED);
        } else if($tec) {
            return response()->json([
                'type' => 'tec',
                'data' => new TecResource($tec)
            ], Response::HTTP_ACCEPTED);
        } else {
            return response()->json('not_found', Response::HTTP_ACCEPTED);
        }
    }
}
