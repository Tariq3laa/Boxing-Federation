<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;
    protected $guraded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\GalleryCategory');
    }
}
