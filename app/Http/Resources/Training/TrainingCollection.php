<?php

namespace App\Http\Resources\Training;

use Illuminate\Support\Facades\URL;
use App\Http\Resources\Coach\CoachResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            // 'category' => $this->category->name,
            'coach' => new CoachResource($this->coach),
            'date' => $this->date,
            'title' => $this->title,
            'age' => $this->age,
            'location' => $this->location,
            'period' => $this->period,
            'price' => $this->price,
            'other_details' => $this->other_details,
            'photo' => URL::to('/') . (str_replace('public', '/storage', $this->photo)),
            'href' => [
                'trainees' => route('course.trainees', $this->id)
            ]
        ];
    }
}
