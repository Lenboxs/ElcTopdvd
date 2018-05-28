<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MovieGenre extends Pivot
{
	use \Rutorika\Sortable\SortableTrait;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'movie_genre';

}
