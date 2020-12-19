<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $guraded = [];

    public function writer()
    {
        return $this->belongsTo('App\Models\Writer');
    }

    public function sponsors()
    {
        return $this->belongsToMany('App\Models\Sponsor', 'news_sponsors', 'news_id', 'sponsor_id');
    }
}
