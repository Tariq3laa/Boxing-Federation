<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;
use App\Http\Resources\Writer\WriterResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Writer\WriterCollection;
use App\Http\Requests\Writer\WriterStoreRequest;
use App\Http\Requests\Writer\WriterUpdateRequest;

class WriterController extends Controller
{
    public function index()
    {
        return WriterCollection::collection(Writer::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(WriterStoreRequest $request)
    {
        $writer = new Writer;
        $writer->name = $request->name;
        $writer->bio = $request->bio;
        $writer->avatar = $request->file('avatar')->store('public');
        $writer->save();

        return response()->json([
            'data' => new WriterResource($writer)
        ], Response::HTTP_CREATED);
    }

    public function show(Writer $writer)
    {
        return new WriterResource($writer);
    }

    public function edit(Writer $writer)
    {
        //
    }

    public function update(WriterUpdateRequest $request, Writer $writer)
    {
        if($request->has('name'))
            $writer->name = $request->name;
        if($request->has('bio'))
            $writer->bio = $request->bio;
        if($request->has('avatar')) {
            unlink(storage_path("app/$writer->avatar"));
            $writer->avatar = $request->file('avatar')->store('public');
        }
        $writer->save();

        return response()->json([
            'data' => new WriterResource($writer)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Writer $writer)
    {
        // unlink(storage_path("app/$writer->avatar"));
        $writer->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
