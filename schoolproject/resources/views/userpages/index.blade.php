@extends('layouts.master')
	@section('title')
		Users
	@stop

	@section('body')

		@foreach($users as $user)
			<TABLE>
				<TR><TD>{{ $user->id }}</TD><TD>{{ $user->firstname }}</TD><TD>{{ $user->lastname }}</TD><TD>{{ $user->username }}</TD><TD>{{ $user->email }}</TD></TR>
			</TABLE>
		@endforeach
	@stop