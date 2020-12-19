<?php

namespace App\Http\Requests\Sponsor;

use Illuminate\Foundation\Http\FormRequest;

class SponsorStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'bail|required|string|max:1000',
            'bio'                   => 'bail|required|string|max:1000',
            'avatar'                => 'bail|required|image',
        ];
    }
}
