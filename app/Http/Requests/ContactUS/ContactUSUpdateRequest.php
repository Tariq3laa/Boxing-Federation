<?php

namespace App\Http\Requests\ContactUS;

use Illuminate\Foundation\Http\FormRequest;

class ContactUSUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|nullable|string|max:1000',
            'email'                 => 'bail|nullable|email|max:1000',
            'phone'                 => 'bail|nullable|string|max:1000',
            'message'               => 'bail|nullable|string|max:1000',
        ];
    }
}
