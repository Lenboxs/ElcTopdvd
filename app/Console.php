<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'consoles';

    public function movies()
  	{
  			return $this->belongsToMany( 'App\GameBranch', 'game_console','console_id' ,'game_branch_id')->using( 'App\GameConsole' )->withTimestamps();
  	}

}
