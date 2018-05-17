<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopHeadlinesPage extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'top_headline_page';
  
  public function movies()
    {
        return $this->hasMany('App\Movie');
    }
    public function series()
    {
        return $this->hasMany('App\Series');
    }

}
