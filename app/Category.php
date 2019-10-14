<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the labels for the category.
     */
    public function labels() {
        return $this->hasMany('App\Label');
    }
}
