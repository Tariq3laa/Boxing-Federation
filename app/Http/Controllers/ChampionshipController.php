<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use Illuminate\Http\Request;
use App\Models\ChampionshipGallery;
use App\Models\ChampionshipOrganizer;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Championship\ChampionshipResource;
use App\Http\Resources\Championship\ChampionshipCollection;
use App\Http\Requests\Championship\ChampionshipStoreRequest;
use App\Http\Requests\Championship\ChampionshipUpdateRequest;

class ChampionshipController extends Controller
{
    public function index()
    {
        return ChampionshipCollection::collection(Championship::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(ChampionshipStoreRequest $request)
    {
        $championship = new Championship;
        $championship->first_place = $request->first_place;
        $championship->second_place = $request->second_place;
        $championship->third_place = $request->third_place;
        $championship->date = $request->date;
        $championship->title = $request->title;
        $championship->status = $request->status;
        $championship->age = $request->age;
        $championship->location = $request->location;
        $championship->other_details = $request->other_details;
        $championship->photo = $request->file('photo')->store('public');
        $championship->save();

        for ($i=0; $i < count($request->organizer_id) ; $i++) {
            $championshipOrganizers = new ChampionshipOrganizer;
            $championshipOrganizers->championship_id = $championship->id;
            $championshipOrganizers->organizer_id = $request->organizer_id[$i];
            $championshipOrganizers->save();
        }

        for ($i=0; $i < count($request->gallery) ; $i++) {
            $championshipGallery = new ChampionshipGallery;
            $championshipGallery->championship_id = $championship->id;
            $championshipGallery->photo = $request->file('gallery')[$i]->store('public');
            $championshipGallery->save();
        }

        return response()->json([
            'data' => new ChampionshipResource($championship)
        ], Response::HTTP_CREATED);
    }

    public function show(Championship $championship)
    {
        return new ChampionshipResource($championship);
    }

    public function edit(Championship $championship)
    {
        //
    }

    public function update(ChampionshipUpdateRequest $request, Championship $championship)
    {
        if($request->has('first_place'))
            $championship->first_place = $request->first_place;
        if($request->has('second_place'))
            $championship->second_place = $request->second_place;
        if($request->has('third_place'))
            $championship->third_place = $request->third_place;
        if($request->has('date'))
            $championship->date = $request->date;
        if($request->has('title'))
            $championship->title = $request->title;
        if($request->has('status'))
            $championship->status = $request->status;
        if($request->has('age'))
        $championship->age = $request->age;
        if($request->has('location'))
            $championship->location = $request->location;
        if($request->has('other_details'))
            $championship->other_details = $request->other_details;
        if($request->has('photo')) {
            unlink(storage_path("app/$championship->photo"));
            $championship->photo = $request->file('photo')->store('public');
        }
        $championship->save();

        return response()->json([
            'data' => new ChampionshipResource($championship)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Championship $championship)
    {
        // unlink(storage_path("app/$championship->photo"));
        // foreach ($championship->gallery as $item) {
        //     unlink(storage_path("app/$item->photo"));
        // }
        $championship->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
