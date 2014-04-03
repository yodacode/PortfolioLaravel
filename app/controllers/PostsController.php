<?php

class PostsController extends BaseController {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();	
		$this->layout->content = View::make('posts.index')->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'create';		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		return 'store';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		return 'show';
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the post
		$post = Post::find($id);
		//$categories = Category::all();
		$categories = Category::lists('title', 'id');		

		
		// show the edit form and pass the post
		return View::make('posts.edit')
			->with('post', $post)
			->with('categories', $categories);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Post::$rules);

		if ($validator->fails()) {			
			return Redirect::to('posts/' . $id . '/edit')
				->withErrors($validator);				
		} else {
			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->url = Input::get('url');
			$post->description = Input::get('description');
			$post->category_id = Input::get('categories');			
			$post->save();

			//redirect
			Session::flash('message', 'Successfuly updated post !');
			return Redirect::to('posts');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}