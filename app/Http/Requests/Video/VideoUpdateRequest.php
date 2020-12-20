<?php

namespace App\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

class VideoUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'     => 'bail|nullable|string|max:1000',
            'video'     => 'bail|nullable|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/x-flv,application/x-mpegURL,video/MP2T,video/3gpp,video/x-msvideo,video/x-ms-wmv',
            'photo'     => 'bail|nullable|image',
        ];
    }
}
