@extends('app')

@section('content')
	<h1>Add a new Event!</h1>

	<hr/>

{!! Form::model($event = new \App\Event, ['action' => ['EventController@store']]) !!}

	@include('events.form', ['submitBtn' => 'Add Event'])

{!! Form::close() !!}

@include('errors.list')

@stop