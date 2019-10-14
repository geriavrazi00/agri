<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    /**
     * Get the category that owns the label.
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
