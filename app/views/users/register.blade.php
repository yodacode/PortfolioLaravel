@extends('layouts.public')
@section('content')
<section class="container">
<div class="page-header">
    <h1>Register</h1>
</div>

    <div class="col-md-3">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
            {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
                <div class="form-group">
                    {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
                </div>
                <div class="form-group">
                    {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
                </div>
                <div class="form-group">
                    {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary'))}}
                </div>
            {{ Form::close() }}
        </div>
    
<section class="container">
@stop
