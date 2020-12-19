<?php

namespace App\Http\Resources\Carousel;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class CarouselCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'photo' => URL::to('/') . (str_replace('public', '/storage', $this->photo)),
        ];
    }
}
