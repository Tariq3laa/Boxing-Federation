<?php

namespace App\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;

class TrainingStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id'          => 'bail|required|numeric|min:1|not_in:0',
            'coach_id'             => 'bail|required|numeric|min:1|not_in:0',
            'date'                 => 'bail|required|string|max:1000',
            'title'                => 'bail|required|string|max:1000',
            'photo'                => 'bail|required|image',
            'age'                  => 'bail|required|string|max:1000',
            'location'             => 'bail|required|string|max:1000',
            'period'               => 'bail|required|string|max:1000',
            'price'                => 'bail|required|numeric|min:1|not_in:0',
            'other_details'        => 'bail|nullable|string|max:1000',
        ];
    }
}
