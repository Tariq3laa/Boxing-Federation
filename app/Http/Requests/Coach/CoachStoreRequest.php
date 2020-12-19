<?php

namespace App\Http\Requests\Coach;

use Illuminate\Foundation\Http\FormRequest;

class CoachStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|required|string|max:1000',
            'bio'                   => 'bail|required|string|max:1000',
            'club'                  => 'bail|required|string|max:1000',
            'avatar'                => 'bail|required|image',
        ];
    }
}
