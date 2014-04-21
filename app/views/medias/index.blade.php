@extends('layouts.master')

@section('content')
	 <form>
	
	             
	         {{ Form::token() }}

	         <span class="btn btn-success fileinput-button">
	             <i class="icon-plus icon-white"></i>
	             <span>Select files...</span>
	             <!-- The file input field used as target for the file upload widget -->
	             {{ Form::file('file', array('id' => 'fileupload', 'multiple' => '', 'accept' => 'image/*')) }}
	         </span>
	         <!-- The global progress bar -->
	         <div id="progress" class="progress progress-success progress-striped">
	             <div class="bar"></div>
	         </div>
	         <!-- The container for the uploaded files -->
	         <div id="files" class="files"></div>
	         <p><br></p>
	         <p><br></p>


	         {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}	        
	     
	
	 </form>
	     
@stop
