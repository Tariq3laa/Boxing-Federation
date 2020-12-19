<?php

namespace App\Http\Resources\Organizer;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'job' => $this->job,
            'avatar' => URL::to('/') . (str_replace('public', '/storage', $this->avatar)),
        ];
    }
}
