<?php

class Tag extends Eloquent {
	
	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	// we only want these 3 attributes able to be filled
	protected $fillable = array('title');

	// DEFINE RELATIONSHIPS --------------------------------------------------
	// define a many to many relationship
	// also call the linking table
	public function posts() {
		return $this->belongsToMany('Post', 'posts_tags', 'tag_id', 'post_id');
	}

}