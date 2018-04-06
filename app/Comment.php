<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = ['name', 'email', 'text', 'blog_id'];

    public function blogs(){
        return $this->belongsTo('App\Blog');
    }
}
