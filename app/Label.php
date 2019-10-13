<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    /**
     * Get the category associated with the label.
     */
    public function category() {
        return $this->hasOne('App\Category');
    }
}
