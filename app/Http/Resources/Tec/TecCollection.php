<?php

namespace App\Http\Resources\Tec;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TecCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'avatar' => URL::to('/') . (str_replace('public', '/storage', $this->avatar)),
        ];
    }
}
