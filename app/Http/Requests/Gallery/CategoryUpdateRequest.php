<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:1000',
                Rule::unique('gallery_categories')->ignore($this->category->id, 'id'),
            ],
        ];
    }
}
