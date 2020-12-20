<?php

namespace App\Http\Resources\Video;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'photo' => URL::to('/') . (str_replace('public', '/storage', $this->photo)),
            'video' => URL::to('/') . (str_replace('public', '/storage', $this->video)),
        ];
    }
}
