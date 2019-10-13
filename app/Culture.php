<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    /**
     * Get the category associated with the culture.
     */
    public function category() {
        return $this->hasOne('App\Category');
    }
}
