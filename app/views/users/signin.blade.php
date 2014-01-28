@extends('layouts.master')
@section('content')
	<div class="page-header">
		<h1>Authentification</h1>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h2>Connectez Vous</h2>
			<div class="col-md-6">
				{{ Form::open(array('action' => 'UserController@signin', 'class' => 'form-horizontal')) }}
					<div class="form-group">
						{{ Form::email('email', $value = null, $attributes = array('placeholder' => 'Adresse E-mail', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::email('password', $value = null, $attributes = array('placeholder' => 'Mot de passe', 'class' => 'form-control')) }}
					</div>		
					<div class="form-group">
						{{ Form::submitCustom('Connection') }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
		<div class="col-md-6">
			<h2>Inscrivez-vous</h2>
			<div class="col-md-8">
				{{ Form::open(array('action' => 'UserController@signin', 'class' => 'form-horizontal')) }}
					<div class="form-group">
						{{ Form::email('email', $value = null, $attributes = array('placeholder' => 'Adresse E-mail', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::email('password', $value = null, $attributes = array('placeholder' => 'Mot de passe', 'class' => 'form-control')) }}
					</div>		
					<div class="form-group">
						{{ Form::submitCustom('Inscription') }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop