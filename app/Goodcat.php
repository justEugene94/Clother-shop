<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goodcat extends Model
{
    //
    public function category(){
        return $this->belongsToMany('App\Category', 'goodcat_category');
    }

    public function goods(){
        return $this->hasMany('App\Good');
    }
}
