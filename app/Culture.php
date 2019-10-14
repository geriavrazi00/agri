<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    /**
     * Get the category that owns the culture.
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
