<?php

namespace App\Http\Controllers;

use App\Models\ContactUS;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ContactUS\ContactUSResource;
use App\Http\Resources\ContactUS\ContactUSCollection;
use App\Http\Requests\ContactUS\ContactUSStoreRequest;
use App\Http\Requests\ContactUS\ContactUSUpdateRequest;

class ContactUSController extends Controller
{
    public function index()
    {
        return ContactUSCollection::collection(ContactUS::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(ContactUSStoreRequest $request)
    {
        $contactUS = new ContactUS;
        $contactUS->name = $request->name;
        $contactUS->email = $request->email;
        $contactUS->phone = $request->phone;
        $contactUS->message = $request->message;
        $contactUS->save();

        return response()->json([
            'data' => new ContactUSResource($contactUS)
        ], Response::HTTP_CREATED);
    }

    public function show(ContactUS $contactU)
    {
        return new ContactUSResource($contactU);
    }

    public function edit(ContactUS $contactUS)
    {
        //
    }

    public function update(ContactUSUpdateRequest $request, ContactUS $contactU)
    {
        if($request->has('name'))
            $contactU->name = $request->name;
        if($request->has('email'))
            $contactU->email = $request->email;
        if($request->has('phone'))
        $contactU->phone = $request->phone;
        if($request->has('message'))
        $contactU->message = $request->message;
        $contactU->save();

        return response()->json([
            'data' => new ContactUSResource($contactU)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(ContactUS $contactU)
    {
        $contactU->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
