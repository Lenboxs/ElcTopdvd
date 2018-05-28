<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TopTenSeriesTemp extends Pivot
{
	use \Rutorika\Sortable\SortableTrait;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'topten_series_temp';

}
