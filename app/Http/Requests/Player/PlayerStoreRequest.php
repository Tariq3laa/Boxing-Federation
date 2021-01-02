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
            'avatar'                => 'bail|required|image',
            'birth'                 => 'bail|required|date',
        ];
    }
}
