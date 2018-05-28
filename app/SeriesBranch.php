<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SeriesBranch extends Pivot
{
	use \Rutorika\Sortable\SortableTrait;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'series_branch';

	public function types()
	{
			return $this->belongsToMany( 'App\Type', 'series_type','series_branch_id','type_id' )->using( 'App\SeriesType' )->withTimestamps();
	}

}
