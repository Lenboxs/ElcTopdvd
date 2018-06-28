<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'home_page';

    public function movies()
    {
        return $this->belongsToMany( 'App\Movie' );
    }

    public function series()
    {
        return $this->belongsToMany( 'App\Series' );
    }

    public function specials()
    {
        return $this->hasMany( 'App\Special' );
    }

    public function slider()
  	{
  			return $this->hasOne( 'App\Slider', 'id', 'slider_id' );
  	}

    public static function getHomePage()
    {
        return HomePage::find( 1 );
    }
}
