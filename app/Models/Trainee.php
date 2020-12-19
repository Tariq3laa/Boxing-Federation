<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainee extends Model
{
    use SoftDeletes;
    protected $guraded = [];

    public function training()
    {
        return $this->belongsToMany('App\Models\Training', 'trainee_trainings', 'trainee_id', 'training_id');
    }
}
