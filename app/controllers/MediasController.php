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
		if (Request::ajax()) {
			$medias = Media::all();
			return Response::json($medias);
		} else {
			$medias = Media::all();
			$this->layout->content = View::make('medias.index')->with('medias', $medias);
		}
	}

	public function postUpload()
	{

		$destinationPath = public_path() . '/uploads/';

		foreach(Input::file('file') as $file){

			$image = $file;
			$filename = str_random(12) . '.jpg';

			$path = public_path('uploads/' . $filename);
			$pathThumb = public_path('uploads/thumbs/' . $filename);

			$img = Image::make($image->getRealPath());
			$img->resize(500, null, true);
			$img->save($path);

			$imgThumb = Image::make($image->getRealPath());
			$imgThumb->resize(150, null, true);
			$imgThumb->save($pathThumb);

	     	$media = new Media;
    		$media->name = $filename;
    		$media->save();

	   		return Response::json(array('filename' => $filename, 'getRealPath' => $image->getRealPath(), 'img' => $path) , 200);

        }
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
	public function destroy($id=null)
	{

		if (Request::ajax()) {

			$media = Media::find(Input::get('id'));
			$media->delete();
			return Response::json(array(
					'message' 	=> 'success',
					'id'		=> Input::get('id')
				), 200);

		} else {

			$media = Media::find($id);
			$media->delete();
			return Redirect::to('medias');
			
		}
	}

}