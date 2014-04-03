<?php

class Category extends Eloquent {
	
	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	// we only want these 3 attributes able to be filled
	protected $fillable = array('title', 'post_id');
	
	public function post() {
		return $this->belongsTo('Post');
	}

}
