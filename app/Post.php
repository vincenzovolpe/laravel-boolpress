<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use Sluggable;

    protected $fillable = ['title', 'author', 'content', 'slug', 'image', 'vote', 'category_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category() {
        // Una categoria ha tanti posts; uso questa funzione per avere la categoria del post
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        // Una categoria ha tanti posts
        return $this->belongsToMany('App\Tag');
    }

}
