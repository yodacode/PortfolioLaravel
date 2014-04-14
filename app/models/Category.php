<?php

class Category extends Eloquent {
	
	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = array('title');

	public static $rules = array(
	    'title'=>'required',
 	);
	
	public function posts() {
		return $this->hasMany('Post');
	}

}
