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
            'birth'                 => 'bail|nullable|date',
            'weight'                => 'bail|nullable|numeric|min:1|not_in:0',
            'avatar'                => 'bail|nullable|image',
        ];
    }
}
