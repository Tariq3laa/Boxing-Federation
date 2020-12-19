<?php

namespace App\Http\Resources\Constant;

use Illuminate\Http\Resources\Json\JsonResource;

class ConstantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'content' => $this->content,
        ];
    }
}
