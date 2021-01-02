<?php

namespace App\Http\Resources\Referee;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class RefereeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'club' => $this->club,
            'rating' => $this->rating,
            'avatar' => URL::to('/') . (str_replace('public', '/storage', $this->avatar)),
        ];
    }
}
