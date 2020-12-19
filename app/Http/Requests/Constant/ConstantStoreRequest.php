<?php

namespace App\Http\Requests\Constant;

use Illuminate\Foundation\Http\FormRequest;

class ConstantStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|required|string|max:1000',
            'content'               => 'bail|required|string|max:1000',
        ];
    }
}
