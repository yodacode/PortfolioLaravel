@extends('layouts.master')


@section('content')
	<div class="page-header">
		<h1>Listing des nerds</h1>
	</div>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Title</td>
				<td>URL</td>
				<td>tags</td>
				<td>Categorie</td>
				<td>Description</td>
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
						{{ $tag->title }}
					@endforeach
				</td>				
				<td>{{ $value->description }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>

@stop