<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movies';

    public function branches()
    {
        return $this->belongsToMany( 'App\Branch', 'movie_branch','movie_id','branch_id' );
    }

    public function topTen()
    {
        return $this->belongsToMany( 'App\TopTenPage', 'topten_movie', 'movie_id', 'topten_id' )->using( 'App\TopTenMovie' )->withTimestamps();
    }

    public function rating()
    {
        return $this->belongsToMany( 'App\User', 'rating' );
    }
}
