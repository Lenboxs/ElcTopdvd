<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeRestriction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'age_restrictions';

    public function movie()
    {
        return $this->belongsTo( 'App\Movie');
    }

    public function series()
    {
        return $this->belongsTo( 'App\Series');
    }
}
