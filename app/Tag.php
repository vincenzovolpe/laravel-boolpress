<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];
    
    public function posts() {
        // Una categoria ha tanti posts
        return $this->belongsToMany('App\Post');
    }
}
