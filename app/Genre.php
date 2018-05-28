<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genres';

    public function movie()
  	{
  			return $this->belongsToMany( 'App\Movie', 'movie_genre', 'genre_id' , 'movie_id')->using( 'App\MovieGenre' )->withTimestamps();
  	}

    public function series()
    {
        return $this->belongsToMany( 'App\Series', 'series_genre', 'genre_id' , 'series_id')->using( 'App\SeriesGenre' )->withTimestamps();
    }
}
