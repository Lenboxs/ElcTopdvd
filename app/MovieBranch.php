<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MovieBranch extends Pivot
{
	use \Rutorika\Sortable\SortableTrait;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'movie_branch';

	public function types()
	{
			return $this->belongsToMany( 'App\Type', 'movie_type','movie_branch_id','type_id' )->using( 'App\MovieType' )->withTimestamps();
	}

}
