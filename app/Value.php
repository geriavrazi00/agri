<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    /**
	 * Get the technology that owns the values.
	 */
	public function technology() {
	    return $this->belongsTo('App\Technology');
	}

	/**
	 * Get the culture that owns the values.
	 */
	public function culture() {
	    return $this->belongsTo('App\Culture');
	}
}
