<?php

namespace App\Http\Requests\ContactUS;

use Illuminate\Foundation\Http\FormRequest;

class ContactUSStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|required|string|max:1000',
            'email'                 => 'bail|required|email|max:1000',
            'phone'                 => 'bail|required|string|max:1000',
            'message'               => 'bail|required|string|max:1000',
        ];
    }
}
