<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function goods(){
        $this->belongsTo('App\Good');
    }
}
