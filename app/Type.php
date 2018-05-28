<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'types';

    public function movies()
  	{
  			return $this->belongsToMany( 'App\MovieBranch', 'movie_type','type_id' ,'movie_branch_id')->using( 'App\MovieType' )->withTimestamps();
  	}

    public function series()
  	{
  			return $this->belongsToMany( 'App\SeriesBranch', 'series_type','type_id' ,'series_branch_id')->using( 'App\SeriesType' )->withTimestamps();
  	}

}
