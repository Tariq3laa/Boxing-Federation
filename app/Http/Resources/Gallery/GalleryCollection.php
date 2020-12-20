<?php

namespace App\Http\Resources\Gallery;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'description' => $this->description,
            'photo' => URL::to('/') . (str_replace('public', '/storage', $this->photo)),
        ];
    }
}
