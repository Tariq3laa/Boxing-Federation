<?php

namespace App\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;

class TrainingUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id'          => 'bail|nullable|numeric|min:1|not_in:0',
            'coach_id'             => 'bail|nullable|numeric|min:1|not_in:0',
            'date'                 => 'bail|nullable|string|max:1000',
            'title'                => 'bail|nullable|string|max:1000',
            'photo'                => 'bail|nullable|image',
            'age'                  => 'bail|nullable|string|max:1000',
            'location'             => 'bail|nullable|string|max:1000',
            'period'               => 'bail|nullable|string|max:1000',
            'price'                => 'bail|nullable|numeric|min:1|not_in:0',
            'other_details'        => 'bail|nullable|string|max:1000',
        ];
    }
}
