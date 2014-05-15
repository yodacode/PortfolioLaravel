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

		$categories = Category::lists('title', 'id');
		$tags = Tag::all();

		return View::make('posts.create')
			->with('tags', $tags)
			->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), Post::$rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('posts/create')
				->withErrors($validator);
		} else {
			// store
			$post = new Post;
			$post->title = Input::get('title');
			$post->url = Input::get('url');
			$post->description = Input::get('description');
			$post->category_id = Input::get('categories');
			$tagsChecked = Input::get('tag');
			$mediasChecked = Input::get('media');
			$post->save();
			
			//now associate the tags
			if(is_array($tagsChecked))
			{
			   foreach ($tagsChecked as $id) {
			   		$post->tags()->attach($id);
			   }
			}

			//now associate the medias
			if(is_array($mediasChecked))
			{
			   foreach ($mediasChecked as $id) {
			   		$post->medias()->attach($id);
			   }
			}

			// redirect
			Session::flash('message', 'Successfully created post!');
			return Redirect::to('posts');
		}
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

		$categories = Category::lists('title', 'id');
		$tags = Tag::all();

		// show the edit form and pass the post
		return View::make('posts.edit')
			->with('post', $post)
			->with('tags', $tags)
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
			$tagsChecked = Input::get('tag');
			$mediasChecked = Input::get('media');
			$post->save();


			//now associate the tags
			if(is_array($tagsChecked))
			{
				// detach all tags
				foreach (Tag::all() as $tag) {
					$post->tags()->detach($tag->id);
				}
				// attach new tags
		   		foreach ($tagsChecked as $idChecked) {
		   			if (is_null($post->tags->find($idChecked))) {
		   				$post->tags()->attach($idChecked);
		   			}
		   		}
			}

			//now associate the medias
			if(is_array($mediasChecked))
			{
				// detach all medias
				foreach (Media::all() as $media) {
					$post->medias()->detach($media->id);
				}
				// attach new medias
		   		foreach ($mediasChecked as $idChecked) {
		   			if (is_null($post->medias->find($idChecked))) {
		   				$post->medias()->attach($idChecked);
		   			}
		   		}
			}
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
		// delete
		$post = Post::find($id);
		$post->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the post!');
		return Redirect::to('posts');
	}

}