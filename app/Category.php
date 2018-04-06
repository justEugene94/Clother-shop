<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function goodcat(){
        return $this->belongsToMany('App\Goodcat', 'goodcat_category');
    }

    public function goods(){
        return $this->hasMany('App\Good', 'category_id');
    }

}
