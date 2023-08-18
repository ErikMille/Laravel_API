<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{

    public function subject(){
        return  $this->hasMany('App\Subject');
    }
    public function User(){
        return  $this->belongsTo('App\User');
    }
}
