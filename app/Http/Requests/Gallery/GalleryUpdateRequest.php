<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class GalleryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id'           => 'bail|nullable|numeric|min:1|not_in:0',
            'description'           => 'bail|nullable|string|max:1000',
            'photo'                 => 'bail|nullable|image',
        ];
    }
}
