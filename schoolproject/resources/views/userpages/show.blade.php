@extends('layouts.master')

	@section('title')
		User Details
	@stop

	@section('body')
	{!! Form::open([ 'method' => 'delete', 'route' => ['users.destroy', $users->id]]) !!}

		{{ $users->firstname }}
		{{ $users->lastname }}
		{{ $users->email }}
		{{ $users->username }}

		{!! Form::submit('Delete') !!}

	{!! Form::close() !!}
	@stop