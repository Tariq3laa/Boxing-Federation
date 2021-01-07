<?php

namespace App\Http\Resources\Coach;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'verified' => $this->is_verified == 1 ? 'yes' : 'no',
            // 'bio' => $this->bio,
            'club' => $this->club,
            'rating' => $this->rating,
            'avatar' => URL::to('/') . (str_replace('public', '/storage', $this->avatar)),
        ];
    }
}
