<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'sliders';

	public function homepage()
	{
			return $this->belongsTo( 'App\Homepage');
	}

	public function slides()
		{
				return $this->hasMany( 'App\Slide');
		}

}
