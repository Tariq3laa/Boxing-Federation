<?php

namespace App\Http\Requests\Writer;

use Illuminate\Foundation\Http\FormRequest;

class WriterStoreRequest extends FormRequest
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
            'avatar'                => 'bail|required|image',
        ];
    }
}
