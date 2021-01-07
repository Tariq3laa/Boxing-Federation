<?php

namespace App\Http\Controllers;

use App\Models\Tec;
use Illuminate\Http\Request;
use App\Mail\Tec\verification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
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
        $tec->verification_code = sha1(time());
        $tec->avatar = $request->file('avatar')->store('public');
        $tec->save();

        $data = [
            'name' => $tec->name,
            'verification_code' => $tec->verification_code
        ];

        Mail::to($tec->email)->send(new verification($data));

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
        unlink(storage_path("app/$tec->avatar"));
        $tec->forceDelete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function verify(Request $request)
    {
        $tec = Tec::where('verification_code', $request->code)->first();
        if($tec) {
            $tec->is_verified = 1;
            $tec->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
            $tec->save();
            return redirect('');
        } else {
            abort(404);
        }
    }
}
