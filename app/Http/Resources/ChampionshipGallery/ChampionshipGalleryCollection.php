<?php

namespace App\Http\Resources\ChampionshipGallery;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class ChampionshipGalleryCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'photo' => URL::to('/') . (str_replace('public', '/storage', $this->photo)),
        ];
    }
}
