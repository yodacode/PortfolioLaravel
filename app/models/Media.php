<?php
class Media extends Eloquent {
	
	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = array('title', 'url', 'post_id');

	
	// DEFINE RELATIONSHIPS --------------------------------------------------
	// define a many to many relationship
	// also call the linking table
	public function posts() {
		return $this->belongsToMany('Post', 'posts_medias', 'media_id', 'post_id');
	}

}

