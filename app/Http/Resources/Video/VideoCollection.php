<?php

namespace App\Http\Resources\Video;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'photo' => URL::to('/') . (str_replace('public', '/storage', $this->photo)),
            'video' => URL::to('/') . (str_replace('public', '/storage', $this->video)),
        ];
    }
}
