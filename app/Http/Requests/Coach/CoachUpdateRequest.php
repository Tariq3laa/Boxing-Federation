<?php

namespace App\Http\Requests\Coach;

use Illuminate\Foundation\Http\FormRequest;

class CoachUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|nullable|string|max:1000',
            'bio'                   => 'bail|nullable|string|max:1000',
            'club'                  => 'bail|nullable|string|max:1000',
            'avatar'                => 'bail|nullable|image',
        ];
    }
}
