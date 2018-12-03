<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdcs extends Model
{
    public function event() {
        return $this->belongsTo('App\Events') ;
    }

}
