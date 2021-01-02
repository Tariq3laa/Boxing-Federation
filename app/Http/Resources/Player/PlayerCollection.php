<?php

namespace App\Http\Resources\Player;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'club' => $this->club,
            'birth' => $this->birth,
            'avatar' => URL::to('/') . (str_replace('public', '/storage', $this->avatar)),
        ];
    }
}
