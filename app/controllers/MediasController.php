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



			// Image::make($file->getRealPath())->resize(300, 200)->save('foo.jpg');

   			//$uploadSuccess = $file->move($destinationPath, $filename);

	   		return Response::json(array('filename' => $filename, 'getRealPath' => $image->getRealPath(), 'img' => $path) , 200);



   //          if($uploadSuccess) {

   //          	$media = new Media;
   //      		$media->name = $filename;
   //      		$media->save();

			// } else {
		 //   		return Response::json('error', 400);
			// }

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
	public function destroy($id)
	{
		$media = Media::find($id);
		$media->delete();
		return Redirect::to('medias');
	}

}