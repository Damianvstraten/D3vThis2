<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags() {
        return $this->belongsToMany('App\Interest', 'post_tags');
    }

    public function study() {
        return $this->belongsTo('App\Study', 'study_id');
    }

    public function owner() {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Filter on all, upcoming, new or best rated games
     *
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeFilter($query, $filterOption)
    {
        if($filterOption != null) {
            switch ($filterOption) {
                case "study":
                    return $query->where('release_date', '<=', date('Y/m/d'))->orderBy('release_date', 'desc');
                case "interest":
                    return $query->where('release_date', '>', date('Y/m/d'))->orderBy('release_date', 'asc');
            }
        }
    }

}
