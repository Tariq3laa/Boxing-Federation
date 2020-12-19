<?php

namespace App\Http\Requests\Founder;

use Illuminate\Foundation\Http\FormRequest;

class FounderUpdateRequest extends FormRequest
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
        ];
    }
}
