<?php

namespace App\Http\Requests\Championship;

use Illuminate\Foundation\Http\FormRequest;

class ChampionshipStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_place'          => 'bail|required|numeric|min:1|not_in:0',
            'second_place'         => 'bail|required|numeric|min:1|not_in:0',
            'third_place'          => 'bail|required|numeric|min:1|not_in:0',
            'organizer_id'         => 'bail|required|array|min:1',
            'organizer_id.*'       => 'bail|required|numeric|min:1|not_in:0',
            'gallery'              => 'bail|nullable|array|min:1',
            'gallery.*'            => 'bail|nullable|image',
            'date'                 => 'bail|required|string|max:1000',
            'title'                => 'bail|required|string|max:1000',
            'photo'                => 'bail|required|image',
            'status'               => 'bail|required|string|max:1000',
            'age'                  => 'bail|required|string|max:1000',
            'location'             => 'bail|required|string|max:1000',
            'other_details'        => 'bail|nullable|string|max:1000',
        ];
    }
}
