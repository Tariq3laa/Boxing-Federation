<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'writer_id'            => 'bail|nullable|numeric|min:1|not_in:0',
            'sponsor_id'           => 'bail|nullable|array|min:1',
            'sponsor_id.*'         => 'bail|nullable|numeric|min:1|not_in:0',
            'date'                 => 'bail|nullable|string|max:1000',
            'title'                => 'bail|nullable|string|max:1000',
            'description'          => 'bail|nullable|string|max:1000',
            'photo'                => 'bail|nullable|image',
        ];
    }
}
