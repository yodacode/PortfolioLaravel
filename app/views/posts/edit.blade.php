@extends('layouts.master')

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
	<div class="page-header">
		<h1>Edit {{ $post->title }}</h1>		
	</div>

	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}

	{{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}

		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('url', 'URL') }}
			{{ Form::text('url', null, array('class' => 'form-control')) }}
		</div>
		<div class="panel panel-info">
	      
	      <div class="panel-body">
	        @foreach ($tags as $tag)
				<span class="label {{{ $tag->active ? 'label-info' : 'label-default' }}}">{{ $tag->title }}</span> 
			@endforeach
	      </div>
	    </div>
		
		<div class="form-group">
			{{ Form::select('categories', $categories, $post->category->id, array('class' => 'form-control input-sm'))}}
			
		</div>
		<div class="form-group">
			{{ Form::label('description', 'Description') }}
			{{ Form::textarea('description', null, array('class' => 'form-control')) }}
		</div>
		

		{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}

@stop