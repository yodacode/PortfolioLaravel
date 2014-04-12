@extends('layouts.master')

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
	<div class="col-md-8">
		<div class="page-header">
			<h1>Create</h1>
		</div>

		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}

		{{ Form::open(array('url' => 'posts', 'class' => 'post-create')) }}

			<div class="form-group">
				{{ Form::label('title', 'Title') }}
				{{ Form::text('title', null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('url', 'URL') }}
				{{ Form::text('url', null, array('class' => 'form-control')) }}
			</div>

			<div class="form-group hidden app-list-checkbox">
				@foreach ($listTags as $tag)
					{{ Form::checkbox('tag[]', $tag->id, $tag->active, array('id' => 'checkbox-'.$tag->id) ) }}
				@endforeach
			</div>

			<div class="form-group">
				{{ Form::select('categories', $categories, null, array('class' => 'form-control input-sm'))}}

			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description') }}
				{{ Form::textarea('description', null, array('class' => 'form-control')) }}
			</div>


			{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}
	</div>
@include('components/sidebar')
@stop