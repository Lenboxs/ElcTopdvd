<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopTenPage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'top_ten_page';

    public function movies()
    {
        return $this->belongsToMany( 'App\Movie', 'topten_movie', 'topten_id', 'movie_id' )->using( 'App\TopTenMovie' )->withTimestamps();
    }

    public function moviestemp()
    {
        return $this->belongsToMany( 'App\Movie', 'topten_movie_temp', 'topten_id', 'movie_id' )->using( 'App\TopTenMovieTemp' )->withTimestamps();
    }

    public function series()
    {
        return $this->belongsToMany( 'App\Series', 'topten_series', 'topten_id', 'series_id' )->using( 'App\TopTenSeries' )->withTimestamps();
    }
  
    public function seriestemp()
    {
        return $this->belongsToMany( 'App\Series', 'topten_series_temp', 'topten_id', 'series_id' )->using( 'App\TopTenSeriesTemp' )->withTimestamps();
    }
}
