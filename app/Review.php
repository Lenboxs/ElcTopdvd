<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'review';

    public function user()
    {
        return $this->belongsTo( 'App\User');
    }

    public function review()
    {
        return $this->morphTo();
    }

}
