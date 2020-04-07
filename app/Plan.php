<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'applicant', 'inputs', 'results'
    ];

	/**
     * Get the category associated with the user.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category associated with the plan.
     */
    public function categories() {
        return $this->belongsToMany('App\Category', 'plan_category', 'plan_id', 'category_id');
    }
}
