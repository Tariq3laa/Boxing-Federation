<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryCategory extends Model
{
    use SoftDeletes;
    protected $guraded = [];
}
