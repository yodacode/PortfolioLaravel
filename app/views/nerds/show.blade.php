@extends('layouts.master')

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
	<div class="page-header">
		<h1>Showing {{ $nerd->name }}</h1>
	</div>

	<div class="jumbotron text-center">
		<h2>{{ $nerd->name }}</h2>
		<p>
			<strong>Email:</strong> {{ $nerd->email }}<br>
			<strong>Level:</strong> {{ $nerd->nerd_level }}
		</p>
	</div>

@stop