<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'series';

  public function branches()
    {
        return $this->belongsToMany('App\Branch', 'series_branch','series_id','branch_id' )->using( 'App\SeriesBranch' )->withTimestamps();
    }

  public function agerestricton()
    {
        return $this->hasOne( 'App\AgeRestriction');
    }

  public function genres()
    {
        return $this->belongsToMany( 'App\Genre', 'series_genre', 'series_id', 'genre_id' )->using( 'App\SeriesGenre' )->withTimestamps();
    }

  public function topTen()
    {
        return $this->belongsToMany( 'App\TopTenPage', 'topten_series', 'movie_id', 'topten_id' )->using( 'App\TopTenSeries' )->withTimestamps();
    }

  public function topTentemp()
    {
        return $this->belongsToMany( 'App\TopTenPage', 'topten_series_temp', 'movie_id', 'topten_id' )->using( 'App\TopTenSeriesTemp' )->withTimestamps();
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
