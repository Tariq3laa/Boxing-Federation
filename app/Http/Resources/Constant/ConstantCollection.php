<?php

namespace App\Http\Resources\Constant;

use Illuminate\Http\Resources\Json\JsonResource;

class ConstantCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'content' => $this->content,
        ];
    }
}
