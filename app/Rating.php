<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rating';

    public function user()
    {
        return $this->belongsTo( 'App\User');
    }
    
    public function rating()
    {
        return $this->morphTo();
    }

}
