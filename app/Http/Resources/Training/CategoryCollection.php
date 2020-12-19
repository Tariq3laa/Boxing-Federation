<?php

namespace App\Http\Resources\Training;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'href' => [
                'trainings' => route('training.show', $this->name)
            ]
        ];
    }
}
