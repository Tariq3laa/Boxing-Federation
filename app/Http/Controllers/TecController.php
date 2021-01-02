<?php

namespace App\Http\Controllers;

use App\Models\Tec;
use Illuminate\Http\Request;
use App\Http\Resources\Tec\TecResource;
use App\Http\Resources\Tec\TecCollection;
use App\Http\Requests\Tec\TecStoreRequest;
use App\Http\Requests\Tec\TecUpdateRequest;
use Symfony\Component\HttpFoundation\Response;

class TecController extends Controller
{
    public function index()
    {
        return TecCollection::collection(Tec::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(TecStoreRequest $request)
    {
        $tec = new Tec;
        $tec->name = $request->name;
        $tec->email = $request->email;
        $tec->password = $request->password;
        $tec->avatar = $request->file('avatar')->store('public');
        $tec->save();

        return response()->json([
            'data' => new TecResource($tec)
        ], Response::HTTP_CREATED);
    }

    public function show(Tec $tec)
    {
        return new TecResource($tec);
    }

    public function edit(Tec $tec)
    {
        //
    }

    public function update(TecUpdateRequest $request, Tec $tec)
    {
        if($request->has('name'))
            $tec->name = $request->name;
        if($request->has('email'))
            $tec->email = $request->email;
        if($request->has('password'))
            $tec->password = $request->password;
        if($request->has('avatar')) {
            unlink(storage_path("app/$tec->avatar"));
            $tec->avatar = $request->file('avatar')->store('public');
        }
        $tec->save();

        return response()->json([
            'data' => new TecResource($tec)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Tec $tec)
    {
        // unlink(storage_path("app/$tec->avatar"));
        $tec->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
