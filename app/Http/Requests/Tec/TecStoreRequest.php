<?php

namespace App\Http\Requests\Tec;

use Illuminate\Foundation\Http\FormRequest;

class TecStoreRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|required|string|max:1000',
            'email'                 => 'bail|required|email|max:1000',
            'password'              => 'bail|required|string|max:1000',
            'avatar'                => 'bail|required|image',
        ];
    }
}
