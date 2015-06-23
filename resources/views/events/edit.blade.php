@extends('app')

@section('content')

<h1>Edit: {!! $event->title !!}</h1>

<hr/>

{!! Form::model($event, ['method' => 'PATCH' , 'action' => ['EventController@update', $event->id]]) !!}

	@include('events.form', ['submitBtn' => 'Update Article'])

{!! Form::close() !!}

@include('errors.list')

@stop