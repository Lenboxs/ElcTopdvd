<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GameGenre extends Pivot
{
	use \Rutorika\Sortable\SortableTrait;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'game_genre';

}
