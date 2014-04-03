@extends('layouts.master')


@section('content')
	<div class="page-header">
		<h1>Posts</h1>			
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</td>
				<th>Title</th>
				<th>URL</th>
				<th>Category</th>
				<th>Tags</th>
				<th>Description</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		@foreach($posts as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->title }}</td>
				<td>{{ $value->url }}</td>
				<td>{{ $value->category->title }}</td>
				<td>
					@foreach ($value->tags as $tag)
						<span class="label label-default">{{ $tag->title }}</span>
					@endforeach
				</td>				
				<td>{{ $value->description }}</td>
				<td><a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $value->id . '/edit') }}">Edit</a></td>

			</tr>
		@endforeach
		</tbody>
	</table>

@stop