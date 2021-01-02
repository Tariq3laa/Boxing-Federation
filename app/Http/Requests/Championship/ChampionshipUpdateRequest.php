<?php

namespace App\Http\Requests\Championship;

use Illuminate\Foundation\Http\FormRequest;

class ChampionshipUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_place'          => 'bail|nullable|numeric|min:1|not_in:0',
            'second_place'         => 'bail|nullable|numeric|min:1|not_in:0',
            'third_place'          => 'bail|nullable|numeric|min:1|not_in:0',
            'organizer_id'         => 'bail|nullable|array|min:1',
            'organizer_id.*'       => 'bail|nullable|numeric|min:1|not_in:0',
            'gallery'              => 'bail|nullable|array|min:1',
            'gallery.*'            => 'bail|nullable|image',
            'date'                 => 'bail|nullable|string|max:1000',
            'title'                => 'bail|nullable|string|max:1000',
            'photo'                => 'bail|nullable|image',
            // 'status'               => 'bail|nullable|string|max:1000',
            'age'                  => 'bail|nullable|string|max:1000',
            'location'             => 'bail|nullable|string|max:1000',
            'other_details'        => 'bail|nullable|string|max:1000',
        ];
    }
}
