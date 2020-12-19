<?php

namespace App\Http\Resources\Founder;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class FounderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'club' => $this->club,
            'avatar' => URL::to('/') . (str_replace('public', '/storage', $this->avatar)),
        ];
    }
}
