<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $table="event_registration";

    public function user(){
        $this->belongTo('App\User');
    }
}
