<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class PlayerStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|required|string|max:1000',
            'club'                  => 'bail|required|string|max:1000',
            'birth'                 => 'bail|required|date',
            'weight'                => 'bail|required|numeric|min:1|not_in:0',
            'avatar'                => 'bail|required|image',
        ];
    }
}
