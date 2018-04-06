<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    public function goods(){
        return $this->belongsToMany('App\Good');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase');
    }

    public function hasGood($name){
        foreach ($this->goods()->get() as $good){
            if($good->name == $name){
                return TRUE;
            }
        }
    }

    public function saveGoods($inputGood){

        if(!empty($inputGood)){
            $this->goods()->sync($inputGood);
        }
        else {
            $this->goods()->detach();
        }

        return TRUE;
    }
}
