<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Om extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function Events() {
        return $this->belongsTo('App\Events') ;
    }

    public function user() {
        return $this->belongsTo('App\User') ;
    }
}
