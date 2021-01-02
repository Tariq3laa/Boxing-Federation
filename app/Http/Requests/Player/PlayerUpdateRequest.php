<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class PlayerUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|nullable|string|max:1000',
            'club'                  => 'bail|nullable|string|max:1000',
            'avatar'                => 'bail|nullable|image',
            'birth'                 => 'bail|nullable|date',
        ];
    }
}
