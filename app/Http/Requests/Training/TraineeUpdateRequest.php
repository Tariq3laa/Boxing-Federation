<?php

namespace App\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;

class TraineeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'training_id'           => 'bail|nullable|numeric|min:1|not_in:0',
            'name'                  => 'bail|nullable|string|max:1000',
            'email'                 => 'bail|nullable|email|max:1000',
            'phone'                 => 'bail|nullable|string|max:1000',
            'message'               => 'bail|nullable|string|max:1000',
        ];
    }
}
