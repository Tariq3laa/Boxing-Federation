<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'writer_id'            => 'bail|required|numeric|min:1|not_in:0',
            'sponsor_id'           => 'bail|required|array|min:1',
            'sponsor_id.*'         => 'bail|required|numeric|min:1|not_in:0',
            'date'                 => 'bail|required|string|max:1000',
            'title'                => 'bail|required|string|max:1000',
            'description'          => 'bail|required|string|max:1000',
            'photo'                => 'bail|required|image',
        ];
    }
}
