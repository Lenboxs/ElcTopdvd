<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'specials';

    public function specialtype()
    {
        return $this->hasOne( 'App\SpecialType');
    }
}
