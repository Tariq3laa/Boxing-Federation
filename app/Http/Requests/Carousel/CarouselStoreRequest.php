<?php

namespace App\Http\Requests\Carousel;

use Illuminate\Foundation\Http\FormRequest;

class CarouselStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'bail|required|string|max:1000',
            'description'           => 'bail|required|string|max:1000',
            'photo'                 => 'bail|required|image',
        ];
    }
}
