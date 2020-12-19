<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use SoftDeletes;
    protected $guraded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\TrainingCategory');
    }

    public function coach()
    {
        return $this->belongsTo('App\Models\Coach');
    }

    public function trainees()
    {
        return $this->belongsToMany('App\Models\Trainee', 'trainee_trainings', 'training_id', 'trainee_id');
    }
}
