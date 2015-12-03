@extends('layouts.master')

	@section('title')
		User Details
	@stop

	<link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />

	@section('body')
	{!! Form::model( $users, [ 'method' => 'patch', 'route' => ['users.update', $users->id]]) !!}

		@if (count($errors) > 0)
			    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

		<p>{!! Form::text('firstname', $users->firstname, ['class'=>'css-input', 'placeholder'=>'enter firstname' ]) !!}</p>
		<p>{!! Form::text('lastname', $users->lastname, ['class'=>'css-input', 'placeholder'=>'enter lastname']) !!}</p>
		<p>{!! Form::email('email', $users->email, ['class'=>'css-input', 'placeholder'=>'myemail@domain.com']) !!}</p>
		<p>{!! Form::text('username', $users->username, ['class'=>'css-input', 'placeholder'=>'my username']) !!}</p>

		<p>{!! Form::submit('Update', ['class'=>'css-button']) !!}</p>

	{!! Form::close() !!}
	@stop