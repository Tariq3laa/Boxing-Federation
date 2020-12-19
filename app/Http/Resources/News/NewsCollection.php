<?php

namespace App\Http\Resources\News;

use Illuminate\Support\Facades\URL;
use App\Http\Resources\Writer\WriterResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Sponsor\SponsorCollection;

class NewsCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'writer' => new WriterResource($this->writer),
            'sponsors' => SponsorCollection::collection($this->sponsors),
            'date' => $this->date,
            'title' => $this->title,
            'description' => $this->description,
            'photo' => URL::to('/') . (str_replace('public', '/storage', $this->photo)),
        ];
    }
}
