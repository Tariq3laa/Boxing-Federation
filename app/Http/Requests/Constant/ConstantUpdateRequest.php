<?php

namespace App\Http\Requests\Constant;

use Illuminate\Foundation\Http\FormRequest;

class ConstantUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|nullable|string|max:1000',
            'content'               => 'bail|nullable|string|max:1000',
        ];
    }
}
