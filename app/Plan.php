<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	/**
     * Get the category associated with the user.
     */
    public function user() {
        return $this->hasOne('App\User');
    }

    /**
     * Get the category associated with the plan.
     */
    public function category() {
        return $this->hasOne('App\Category');
    }
}
