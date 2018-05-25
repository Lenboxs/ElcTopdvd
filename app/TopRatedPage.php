<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopRatedPage extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'top_rated_page';

  public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }
    public function series()
    {
        return $this->belongsToMany('App\Series');
    }

}
