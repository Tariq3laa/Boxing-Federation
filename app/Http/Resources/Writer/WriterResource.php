<?php

namespace App\Http\Resources\Writer;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class WriterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'bio' => $this->bio,
            'avatar' => URL::to('/') . (str_replace('public', '/storage', $this->avatar)),
        ];
    }
}
