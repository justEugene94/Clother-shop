<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //
    protected $fillable = ['name', 'desc', 'text', 'price', 'category_id', 'brand_id', 'goodcat_id', 'image'];
    public function brands(){
        return $this->belongsTo('App\Brand', 'brand_id','id');
    }

    public function goodcats(){
        return $this->belongsTo('App\Goodcat', 'goodcat_id', 'id');
    }

    public function categories(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function colors(){
        return $this->belongsToMany('App\Color');
    }

    public function sizes(){
        return $this->belongsToMany('App\Size');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase');
    }
}
