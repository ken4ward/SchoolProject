@extends('layouts.master')

	@section('title')
		Create User
	@stop

	<link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />

	@section('body')
		{!! Form::open(array('action' => 'UserController@store')) !!}

			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			<p>{!! Form::text('firstname', '', ['class'=>'css-input', 'placeholder'=>'enter firstname' ]) !!}</p>
			<p>{!! Form::text('lastname', '', ['class'=>'css-input', 'placeholder'=>'enter lastname']) !!}</p>
			<p>{!! Form::email('email', '', ['class'=>'css-input', 'placeholder'=>'myemail@domain.com']) !!}</p>
			<p>{!! Form::text('username', '', ['class'=>'css-input', 'placeholder'=>'my username']) !!}</p>
			<p>{!! Form::password('password', ['class'=>'css-input', 'placeholder'=>'password']) !!}</p>
			<p>{!! Form::password('password_confirmation', ['class'=>'css-input', 'placeholder'=>'repeat password']) !!}</p>

			<p>{!! Form::submit('SUBMIT', ['class'=>'css-button']) !!}</p>
		{!! Form::close() !!}
	@stop