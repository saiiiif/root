<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{

  protected $fillable = [
    'end_date','start_date','prime_amount', 'name',  'status'
  ];

    public function Events() {
        return $this->belongsTo('App\Events') ;
    }

    public function user() {
        return $this->belongsTo('App\User') ;
    }

}
