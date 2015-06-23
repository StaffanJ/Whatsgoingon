@extends('app')

@section('content')
	<h1>Add a new Event!</h1>

	<hr/>

{!! Form::model($event = new \App\Event, ['url' => 'events']) !!}

	@include('events.form', ['submitBtn' => 'Add Event'])

{!! Form::close() !!}

@include('errors.list')

@stop