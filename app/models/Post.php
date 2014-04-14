<?php

class Post extends Eloquent
{

	protected $fillable = array('title', 'url', 'description');

	public static $rules = array(
	    'title'=>'required',
	    'url'=>'required',
	    'description'=>'required',
 	);

	// each post has many categories
	public function category() {
		return $this->belongsTo('Category');
	}

	// each post BELONGS to many media
	// define our pivot table also
	public function medias() {
		return $this->belongsToMany('Media', 'posts_medias', 'post_id', 'media_id');
	}

	// each post BELONGS to many tag
	// define our pivot table also
	public function tags() {
		return $this->belongsToMany('Tag', 'posts_tags', 'post_id', 'tag_id');
	}
}