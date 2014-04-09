@extends('layouts.master')


@section('content')
	<div class="page-header">
		<h1>Tags</h1>
	</div>
	<div class="col-md-4">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</td>
					<th>Title</th>				
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			@foreach($tags as $key => $value)
				<tr>
					<td>{{ $value->id }}</td>
					<td>{{ $value->title }}</td>												
					<td>
						<a class="btn btn-small btn-danger btn-sm" href="{{ URL::to('tags/' . $value->id . '/destroy') }}"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
@stop
