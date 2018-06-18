<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{

    public function posts() {
        return $this->hasMany('App\Post', 'id');
    }
    public function students() {
        return $this->belongsToMany('App\User', "user_id");
    }
}
