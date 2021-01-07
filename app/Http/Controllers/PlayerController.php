<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Resources\Player\PlayerResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Player\PlayerCollection;
use App\Http\Requests\Player\PlayerStoreRequest;
use App\Http\Requests\Player\PlayerUpdateRequest;

class PlayerController extends Controller
{
    public function index()
    {
        return PlayerCollection::collection(Player::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(PlayerStoreRequest $request)
    {
        $player = new Player;
        $player->name = $request->name;
        $player->club = $request->club;
        $player->birth = $request->birth;
        $player->weight = $request->weight;
        $player->avatar = $request->file('avatar')->store('public');
        $player->save();

        return response()->json([
            'data' => new PlayerResource($player)
        ], Response::HTTP_CREATED);
    }

    public function show(Player $player)
    {
        return new PlayerResource($player);
    }

    public function edit(Player $player)
    {
        //
    }

    public function update(PlayerUpdateRequest $request, Player $player)
    {
        if($request->has('name'))
            $player->name = $request->name;
        if($request->has('club'))
            $player->club = $request->club;
        if($request->has('birth'))
            $player->birth = $request->birth;
        if($request->has('weight'))
            $player->weight = $request->weight;
        if($request->has('avatar')) {
            unlink(storage_path("app/$player->avatar"));
            $player->avatar = $request->file('avatar')->store('public');
        }
        $player->save();

        return response()->json([
            'data' => new PlayerResource($player)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Player $player)
    {
        unlink(storage_path("app/$player->avatar"));
        $player->forceDelete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
