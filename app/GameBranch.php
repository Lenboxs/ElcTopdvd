<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GameBranch extends Pivot
{
	use \Rutorika\Sortable\SortableTrait;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'Game_branch';

	public function types()
	{
			return $this->belongsToMany( 'App\Console', 'game_console','game_branch_id','console_id' )->using( 'App\GameConsole' )->withTimestamps();
	}

}
