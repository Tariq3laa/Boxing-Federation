<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Constant extends Model
{
    use SoftDeletes;
    protected $guraded = [];

    public function getRouteKeyName()
    {
        return 'name';
    }
}
