<?php

namespace App\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;

class TraineeStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'training_id'           => 'bail|required|numeric|min:1|not_in:0',
            'name'                  => 'bail|required|string|max:1000',
            'email'                 => 'bail|required|email|max:1000',
            'phone'                 => 'bail|required|string|max:1000',
            'message'               => 'bail|required|string|max:1000',
        ];
    }
}
