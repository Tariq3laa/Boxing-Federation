<?php

namespace App\Http\Resources\Championship;

use Illuminate\Support\Facades\URL;
use App\Http\Resources\Player\PlayerResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Organizer\OrganizerCollection;
use App\Http\Resources\ChampionshipGallery\ChampionshipGalleryCollection;

class ChampionshipCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_place' => new PlayerResource($this->first_place_player),
            'second_place' => new PlayerResource($this->second_place_player),
            'third_place' => new PlayerResource($this->third_place_player),
            'organizers' => OrganizerCollection::collection($this->organizers),
            'gallery' => ChampionshipGalleryCollection::collection($this->gallery),
            'date' => $this->date,
            'title' => $this->title,
            'status' => $this->status,
            'age' => $this->age,
            'location' => $this->location,
            'other_details' => $this->other_details,
            'photo' => URL::to('/') . (str_replace('public', '/storage', $this->photo)),
        ];
    }
}
