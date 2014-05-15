@extends('layouts.master')

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
	<div class="col-md-8">
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
			<div class="form-group hidden app-tags-checkbox">
				@foreach ($listTags as $tag)
					{{ Form::checkbox('tag[]', $tag->id, $tag->active, array('id' => 'checkbox-'.$tag->id) ) }}
				@endforeach
			</div>			
			<div class="form-group hidden app-medias-checkbox">
				@foreach ($listMedias as $media)
					{{$media->id}}
					{{ Form::checkbox('media[]', $media->id, $media->active, array('id' => 'checkbox-media-'.$media->id) ) }}
				@endforeach
			</div>
			<div class="form-group">
				{{ Form::select('categories', $categories, isset($post->category->id) ? $post->category->id : '', array('class' => 'form-control input-sm app-select'))}}
			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description') }}
				{{ Form::textarea('description', null, array('class' => 'form-control')) }}
			</div>
		{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
	</div>

	{{ Form::close() }}

@include('components/sidebar')
@stop
