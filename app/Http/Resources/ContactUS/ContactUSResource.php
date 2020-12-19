<?php

namespace App\Http\Resources\ContactUS;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUSResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ];
    }
}
