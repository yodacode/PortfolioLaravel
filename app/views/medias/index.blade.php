@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>
			Medias
			<button class="btn btn-small btn-success btn-sm" data-toggle="modal" data-target="#mediaUpload">
			  <span class="glyphicon glyphicon-plus"></span>
			</button>
		</h1>
	</div>
	<div class="col-md-4">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</td>
					<th>name</th>				
					<th>Preview</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			@foreach($medias as $key => $value)
				<tr>
					<td>{{ $value->id }}</td>
					<td>{{ $value->name }}</td>												
					<td>{{ $value->name }}</td>												
					<td>
						<a class="btn btn-small btn-danger btn-sm" href="{{ URL::to('medias/' . $value->id . '/destroy') }}"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="mediaUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Upload new file</h4>
	      </div>
	      <div class="modal-body">

	      	<form id="myform" action="" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="preview_image" id="preview_image" value="">
                   <div id="mulitplefileuploader">Upload</div>
                   <span class="btn btn-default submit_form">Submit Form</span>
	           </form>
	           
	    	   <!--  <div class="form-group">
	    	       <label for="exampleInputFile">File input</label>
	    	       <input type="file" class="app-input-file">    
	    	       


	    	       



	    	       <p class="help-block">Example block-level help text here.</p>
	         	</div> -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Upload</button>
	      </div>
	    </div>
	  </div>
	</div>
@stop
