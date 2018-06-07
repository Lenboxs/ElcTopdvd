<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slides';

    public function sliders()
    {
        return $this->belongsTo( 'App\Slider');
    }
  }
