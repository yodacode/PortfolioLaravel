<?php

class MediasController extends BaseController {


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
		$medias = Media::all();
		$this->layout->content = View::make('medias.index')->with('medias', $medias);
	}

	public function postUpload()
	{
		// $file = Input::file('file');
		// $filename = Str::slug(Input::get('title'));
		// $filesave = $filename.'.jpg';
		


		$file = Input::file('file');
		 
		$destinationPath = public_path().'/uploads/';
		$filename = str_random(12);
		$upload_success = Input::file('file')->move($destinationPath, $filename);
		if( $upload_success ) {
		   return Response::json('success', 200);
		} else {
		   return Response::json('error', 400);
		}

		//return Response::json(array('destinationPath' => $destinationPath, 'filename' => $filename), 200);

		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		// $upload_success = Input::file('file')->move($destinationPath, $filename);
		 
		// if( $upload_success ) {
		//    return Response::json('success', 200);
		// } else {
		//    return Response::json('error', 400);
		// }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$media = Media::find($id);
		$media->delete();
		return Redirect::to('medias');
	}

}