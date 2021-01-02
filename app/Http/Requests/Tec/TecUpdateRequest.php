<?php

namespace App\Http\Requests\Tec;

use Illuminate\Foundation\Http\FormRequest;

class TecUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|nullable|string|max:1000',
            'email'                 => 'bail|nullable|email|max:1000',
            'password'              => 'bail|nullable|string|max:1000',
            'avatar'                => 'bail|nullable|image',
        ];
    }
}
