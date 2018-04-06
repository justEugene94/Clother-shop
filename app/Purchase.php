<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $fillable = ['price', 'customer_id', 'good_id', 'size_id', 'color_id'];

    public function customers(){
        return $this->belongsTo('App\Customer');
    }

    public function goods(){
        return $this->belongsTo('App\Good');
    }

    public function sizes(){
        return $this->belongsTo('App\Size');
    }

    public function colors(){
        return $this->belongsTo('App\Color');
    }
}
