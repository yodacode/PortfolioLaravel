@extends('layouts.public')
@section('content')
<section class="container">
    <div class="page-header">
        <h1>Login</h1>
    </div>
    <div class="col-md-3">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
        {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signup')) }}
            <div class="form-group">
                {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
            </div>
            <div class="form-group">
                {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
            </div>
            <div class="form-group">
            	{{ Form::submit('Login', array('class'=>'btn btn-large btn-primary'))}}
            </div>                
        {{ Form::close() }}        
    </div>
</section>
@stop