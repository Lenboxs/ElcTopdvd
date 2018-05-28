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
        return $this->belongsToMany( 'App\Branch', 'movie_branch','movie_id','branch_id' )->using( 'App\MovieBranch' )->withTimestamps();
    }

    public function agerestricton()
    {
        return $this->hasOne( 'App\AgeRestriction');
    }

    public function genre()
    {
        return $this->belongsToMany( 'App\Genre', 'movie_genre', 'movie_id', 'genre_id' )->using( 'App\MovieGenre' )->withTimestamps();
    }

    public function topTen()
    {
        return $this->belongsToMany( 'App\TopTenPage', 'topten_movie', 'movie_id', 'topten_id' )->using( 'App\TopTenMovie' )->withTimestamps();
    }

    public function topTentemp()
    {
        return $this->belongsToMany( 'App\TopTenPage', 'topten_movie_temp', 'movie_id', 'topten_id' )->using( 'App\TopTenMovieTemp' )->withTimestamps();
    }

    public function review()
      {
          return $this->morphMany('App\Review', 'reviewable');
      }
      public function rating()
    {
        return $this->morphMany('App\Rating', 'rateable');
    }
}
