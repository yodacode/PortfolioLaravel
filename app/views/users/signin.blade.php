@extends('layouts.master')
@section('content')
	<div class="page-header">
		<h1>formulaire signin</h1>
	</div>
	{{ Form::open(array('action' => 'UserController@signin', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::email('email', $value = null, $attributes = array('placeholder' => 'Adresse E-mail', 'class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::email('password', $value = null, $attributes = array('placeholder' => 'Mot de passe', 'class' => 'form-control')) }}
		</div>		
		<div class="form-group">
			{{ Form::submitCustom('Se connecter') }}
		</div>
	{{ Form::close() }}
@stop