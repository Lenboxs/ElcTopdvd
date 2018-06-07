<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'specialtype';

    public function specials()
    {
        return $this->belongsTo( 'App\Special');
    }
}
