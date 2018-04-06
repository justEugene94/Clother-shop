<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['name', 'surname', 'email', 'bank_card', 'total_price'];

    public function purchases(){
        return $this->hasMany('App\Purchase');
    }
}
