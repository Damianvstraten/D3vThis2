<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function users() {
        return $this->belongsToMany('App\User', 'user_interests');
    }

    public function posts() {
        return $this->belongsToMany('App\Post', 'post_tags');
    }

}
