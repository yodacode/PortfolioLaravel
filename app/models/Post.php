<?php

class Post extends Eloquent
{

	protected $fillable = array('title', 'url', 'description');

	// each post has many categories
	public function category() {
		return $this->belongsTo('Category');
	}

	// each post BELONGS to many tag
	// define our pivot table also
	public function tags() {
		return $this->belongsToMany('Tag', 'posts_tags', 'post_id', 'tag_id');
	}
}