<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function Session(){
        return  $this->hasMany('App\Session');
    }
    public function subject_name(){
        return  $this->belongsTo('App\SubjectName');
    }
}
