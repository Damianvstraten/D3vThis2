<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function study() {
        return $this->belongsTo('App\Study', 'study_id');
    }

    public function interests() {
        return $this->belongsToMany('App\Interest', 'user_interests');
    }
    public function posts() {
        return $this->hasMany('App\Post', 'user_id');
    }
}