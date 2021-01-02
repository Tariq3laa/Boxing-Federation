<?php

namespace App\Http\Resources\Coach;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            // 'bio' => $this->bio,
            'club' => $this->club,
            'rating' => $this->rating,
            'avatar' => URL::to('/') . (str_replace('public', '/storage', $this->avatar)),
        ];
    }
}
