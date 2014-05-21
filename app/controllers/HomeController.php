<?php

class HomeController extends BaseController {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';

	public function index()
	{
		$posts = Post::all();
		$this->layout->content = View::make('home.index')->with('posts', $posts);
	}

}