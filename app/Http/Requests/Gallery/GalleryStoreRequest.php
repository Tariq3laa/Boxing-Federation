<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class GalleryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id'           => 'bail|required|numeric|min:1|not_in:0',
            'description'           => 'bail|required|string|max:1000',
            'photo'                 => 'bail|required|image',
        ];
    }
}
