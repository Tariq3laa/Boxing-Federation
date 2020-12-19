<?php

namespace App\Http\Resources\ContactUS;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUSCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ];
    }
}
