<?php

namespace App\Http\Requests\Carousel;

use Illuminate\Foundation\Http\FormRequest;

class CarouselUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'bail|nullable|string|max:1000',
            'description'           => 'bail|nullable|string|max:1000',
            'photo'                 => 'bail|nullable|image',
        ];
    }
}
