<?php

namespace App\Http\Controllers;

use App\Models\Constant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Constant\ConstantResource;
use App\Http\Resources\Constant\ConstantCollection;
use App\Http\Requests\Constant\ConstantStoreRequest;
use App\Http\Requests\Constant\ConstantUpdateRequest;

class ConstantController extends Controller
{
    public function index()
    {
        return ConstantCollection::collection(Constant::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(ConstantStoreRequest $request)
    {
        $constant = new Constant;
        $constant->name = $request->name;
        $constant->content = $request->content;
        $constant->save();

        return response()->json([
            'data' => new ConstantResource($constant)
        ], Response::HTTP_CREATED);
    }

    public function show(Constant $constant)
    {
        return new ConstantResource($constant);
    }

    public function edit(Constant $constant)
    {
        //
    }

    public function update(ConstantUpdateRequest $request, Constant $constant)
    {
        if($request->has('name'))
            $constant->name = $request->name;
        if($request->has('content'))
            $constant->content = $request->content;
        $constant->save();

        return response()->json([
            'data' => new ConstantResource($constant)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Constant $constant)
    {
        $constant->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
