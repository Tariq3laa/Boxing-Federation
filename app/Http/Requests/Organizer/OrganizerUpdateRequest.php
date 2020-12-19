<?php

namespace App\Http\Requests\Organizer;

use Illuminate\Foundation\Http\FormRequest;

class OrganizerUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|nullable|string|max:1000',
            'job'                   => 'bail|nullable|string|max:1000',
            'avatar'                => 'bail|nullable|image',
        ];
    }
}
