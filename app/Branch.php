<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'branches';

  public function movies()
  {
      return $this->belongsToMany( 'App\Movie', 'movie_branch','branch_id','movie_id' )->using( 'App\MovieBranch' )->withTimestamps();
  }
}
