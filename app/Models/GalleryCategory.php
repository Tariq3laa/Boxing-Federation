<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryCategory extends Model
{
    use SoftDeletes;
    protected $guraded = [];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\Gallery', 'category_id', 'id');
    }
}
