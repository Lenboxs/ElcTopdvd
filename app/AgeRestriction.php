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
<<<<<<< HEAD
    protected $table = 'age_restrictons';
=======
    protected $table = 'age_restricton';

    public function movie()
    {
        return $this->belongsTo( 'App\Movie');
    }

    public function series()
    {
        return $this->belongsTo( 'App\Series');
    }
>>>>>>> a16e4cc4aa6516dc1ab00aac7ffe9c7ac7889d49
}
