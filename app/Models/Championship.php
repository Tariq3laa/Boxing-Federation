<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Championship extends Model
{
    use SoftDeletes;
    protected $guraded = [];

    public function first_place_player()
    {
        return $this->belongsTo('App\Models\Player', 'first_place', 'id');
    }

    public function second_place_player()
    {
        return $this->belongsTo('App\Models\Player', 'second_place', 'id');
    }

    public function third_place_player()
    {
        return $this->belongsTo('App\Models\Player', 'third_place', 'id');
    }

    public function organizers()
    {
        return $this->belongsToMany('App\Models\Organizer', 'championship_organizers', 'championship_id', 'organizer_id');
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\ChampionshipGallery');
    }
}
