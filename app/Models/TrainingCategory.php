<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingCategory extends Model
{
    use SoftDeletes;
    protected $guraded = [];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function trainings()
    {
        return $this->hasMany('App\Models\Training', 'category_id', 'id');
    }
}
