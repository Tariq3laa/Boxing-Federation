<?php

namespace App\Http\Requests\Referee;

use Illuminate\Foundation\Http\FormRequest;

class RefereeUpdateRequest extends FormRequest
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
            'rating'                => 'bail|nullable|numeric|min:0',
        ];
    }
}
