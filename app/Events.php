<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo('App\User') ;
    }

    public function pdc() {
        return $this->hasMany('App\Pdcs') ;
    }

    public function trip() {
        return $this->hasMany('App\Trip') ;
    }

    public function oms() {
        return $this->hasMany('App\Om') ;
    }
{}
}
