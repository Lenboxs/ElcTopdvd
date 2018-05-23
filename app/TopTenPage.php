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
        return $this->hasMany('App\Movie','topten_movie');
    }
  public function series()
    {
        return $this->hasMany('App\Series');
    }
}
