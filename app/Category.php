<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts() {
        // Una categoria ha tanti posts
        return $this->hasMany('App\Post');
    }
}
